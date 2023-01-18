# uid, uuid
![Packagist Version](https://img.shields.io/packagist/v/hyqo/uid?style=flat-square)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/hyqo/uid?style=flat-square)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/hyqo/uid/tests.yml?branch=main&style=flat-square&label=tests)

## Install

```sh
composer require hyqo/uid
```

## uid(int $length = 8): string
Generate random string with provided length (from 4 to 128)

```php
use Hyqo\Uid\uid;

echo uid(4); //D6rn
echo uid(); //sUnXsNxg
echo uid(32); //wFqrtHZrMTPJcfNDsoixGAvUgf2qZQxg
```

## uuid4(): string
Generate UUID v4

```php
use Hyqo\Uid\uuid4;

echo uuid4(); //17ef386f-043a-4327-b959-f853c3337c34
```
