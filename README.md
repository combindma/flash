# Easy Flash Messages for a Laravel App

[![Latest Version on Packagist](https://img.shields.io/packagist/v/combindma/flash.svg?style=flat-square)](https://packagist.org/packages/combindma/flash)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/combindma/flash/run-tests?label=tests)](https://github.com/combindma/flash/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/combindma/flash/Check%20&%20fix%20styling?label=code%20style)](https://github.com/combindma/flash/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/combindma/flash.svg?style=flat-square)](https://packagist.org/packages/combindma/flash)

## Installation

You can install the package via composer:

```bash
composer require combindma/flash
```

## Usage

```php
class MySpecialSnowflakeController
{
    public function store()
    {
        // …

        flash('My message', 'my-class');

        return back();
    }
}
```

In your view you can do this:

```html
@if (flash()->message)
<div class="{{ flash()->class }}">
    {{ flash()->message }}
</div>
@endif
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/combindma)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
