# Easy Flash Messages for a Laravel App

[![Latest Version on Packagist](https://img.shields.io/packagist/v/combindma/flash.svg?style=flat-square)](https://packagist.org/packages/combindma/flash)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/combindma/flash/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/combindma/flash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/combindma/flash/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/combindma/flash/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
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

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/combindma)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
