<?php

use Combindma\Flash\Flash;
use Combindma\Flash\Message;

it('can set a simple flash message', function () {
    flash('my message');
    expect(flash()->message)->toBe('my message');
});

it('can set a flash message with a class', function () {
    flash('my message', 'my-class');
    expect(flash()->message)->toBe('my message')
        ->and(flash()->class)->toBe('my-class');
});

it('can set a flash message with multiple classes', function () {
    flash('my message', ['my-class', 'another-class']);
    expect(flash()->message)->toBe('my message')
        ->and(flash()->class)->toBe('my-class another-class');
});

it('can make the flash function macroable', function () {
    Flash::macro('info', function (string $message) {
        $this->flash(new Message($message, 'my-info-class'));
    });
    flash()->info('my message');
    expect(flash()->message)->toBe('my message')
        ->and(flash()->class)->toBe('my-info-class');
});

it('can add multiple methods in one go', function () {
    Flash::levels([
        'warning' => 'alert-warning',
        'error' => 'alert-error',
    ]);
    flash()->warning('my warning');
    expect(flash()->message)->toBe('my warning')
        ->and(flash()->class)->toBe('alert-warning');
    flash()->error('my error');
    expect(flash()->message)->toBe('my error')
        ->and(flash()->class)->toBe('alert-error');
});

it('can get the flash level when the level is registered using the macro', function () {
    Flash::macro('info', function (string $message) {
        $this->flash(new Message($message, 'my-info-class', 'info'));
    });
    flash()->info('my info message');
    expect(flash()->level)->toBe('info');
});

it('can get the flash level when levels are registering in one go', function () {
    Flash::levels([
        'warning' => 'alert-warning',
        'error' => 'alert-error',
    ]);
    flash()->error('my error');
    expect(flash()->level)->toBe('error');
});

it('can pass a class name that is registered as method it will call that method', function () {
    flash('my message', 'custom');
    expect(flash()->class)->toBe('custom');
    Flash::levels([
        'custom' => 'overridden-custom',
    ]);
    flash('my message', 'custom');
    expect(flash()->class)->toBe('overridden-custom');
});

it('can empty flash message and returns null', function () {
    expect(flash()->message)->toBeNull();
});
