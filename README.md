# PHP ISO-3166-1 library
> A PHP function providing simple checksum formula used to validate a variety of identification numbers .

## Installing

``` sh
$ composer require zhuravel/php-luhn-checksum
```

## Example
```php
<?php
require 'vendor/autoload.php';

$number = 79927398713;

var_dump(isValidLuhnChecksum($number));
```

## Source(s)

* [Luhn algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm) by [Wikipedia](http://www.wikipedia.org)