<?php

use Combindma\Flash\Flash;
use Combindma\Flash\Message;

/**
 * @param  null  $class
 */
function flash(?string $text = null, $class = null): Flash
{
    /** @var Flash $flash */
    $flash = app(Flash::class);

    if (is_null($text)) {
        return $flash;
    }

    $message = new Message($text, $class);

    $flash->flash($message);

    return $flash;
}
