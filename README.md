# Khmercut

<p align="center">
<a href="https://github.com/ankgordotdev/khmercut"><img src="https://github.com/ankgordotdev/khmercut/actions/workflows/tests.yml/badge.svg" alt="Status"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/packagist/dt/angkor/khmercut" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/packagist/v/angkor/khmercut" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="License: MIT" /></a>
</p>



## Installation

You can install the package via composer:

```bash
composer require angkor/khmercut
```

## Usage

```php
use use Angkor\Khmercut\Tokenizer;

Tokenizer::make('Pretty girl សួស្តីស្រីស្អាត Hello World សួស្តីពិភពលោក');

//output: "Pretty girl សួស្តី\u{200B}ស្រី\u{200B}ស្អាត Hello World សួស្តី\u{200B}ពិភពលោក";

Tokenizer::make('Pretty girl សួស្តីស្រីស្អាត Hello World សួស្តីពិភពលោក', '|');

```

`Tokenizer` will add the `ZERO WIDTH SPACE` only Khmer Word.

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email semsphy@gmail.com instead of using the issue tracker.

## Credits

-   [Sophy SEM](https://github.com/semsphy)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
