<?php


use Combindma\Flash\Flash;
use Combindma\Flash\Message;

/**
 * @param string $text
 * @param string|array $class
 */
function flash(string $text = null, $class = null): Flash
{
    /** @var \Combindma\Flash\Flash $flash */
    $flash = app(Flash::class);

    if (is_null($text)) {
        return $flash;
    }

    $message = new Message($text, $class);

    $flash->flash($message);

    return $flash;
}
