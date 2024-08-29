# Khmercut

<p align="center">
<a href="https://github.com/ankgordotdev/khmercut"><img src="https://github.com/ankgordotdev/khmercut/actions/workflows/tests.yml/badge.svg" alt="Status"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/packagist/dt/angkor/khmercut" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/packagist/v/angkor/khmercut" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/angkor/khmercut"><img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="License: MIT" /></a>
</p>

`Khmercut` is a wrapper for the PHP Laravel framework, built on top of the Rust package created by [seanghay/khmercut](https://github.com/seanghay/khmercut). This allows developers to leverage the functionality provided by the `khmercut` Rust package within a Laravel application.


## Installation

You can install the package via composer:

```bash
composer require angkor/khmercut
```

## Download

You can download the built from [Release](https://github.com/semsphy/khmercut-rs/releases) link and choose the right platform and move it to where want it to be.

## Usage

Publish the configuration file to set the binary path

```bash
php artisan vendor:publish --provider="Angkor\Khmercut\KhmercutServiceProvider" --tag="config"
```

Setup the `.env` variable

```ini
TOKENIZER_BINARY_PATH=usr/local/bin/khmercut
```



```php
use use Angkor\Khmercut\Tokenizer;

Tokenizer::make('Pretty girl សួស្តីស្រីស្អាត Hello World សួស្តីពិភពលោក');

//output: "Pretty girl សួស្តី\u{200B}ស្រី\u{200B}ស្អាត Hello World សួស្តី\u{200B}ពិភពលោក";

Tokenizer::make('Pretty girl សួស្តីស្រីស្អាត Hello World សួស្តីពិភពលោក', '|');

//output: "Pretty girl សួស្តី|ស្រី|ស្អាត Hello World សួស្តី|ពិភពលោក";

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
-   [Seanghay Yath](https://github.com/seanghay)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
