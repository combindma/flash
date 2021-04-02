<?php

namespace Combindma\Flash;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Traits\Macroable;

class Flash
{
    use Macroable;

    protected Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function __get(string $name)
    {
        return $this->getMessage()->$name ?? null;
    }

    public function getMessage(): ?Message
    {
        $flashedMessageProperties = $this->session->get('flash_message');

        if (! $flashedMessageProperties) {
            return null;
        }

        return new Message(
            $flashedMessageProperties['message'],
            $flashedMessageProperties['class'],
            $flashedMessageProperties['level']
        );
    }

    public function flash(Message $message): void
    {
        if ($message->class && static::hasMacro($message->class)) {
            $methodName = $message->class;

            $this->$methodName($message->message);

            return;
        }

        $this->flashMessage($message);
    }

    public function flashMessage(Message $message): void
    {
        $this->session->flash('flash_message', $message->toArray());
    }

    public static function levels(array $methodClasses): void
    {
        foreach ($methodClasses as $method => $classes) {
            self::macro($method, (function (string $message) use ($method, $classes) {
                $this->flashMessage(new Message($message, $classes, $method));
            }));
        }
    }
}
