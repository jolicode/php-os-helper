# PHP OS Helper

This library provides some helpers to detect OS of the machine where PHP is running.

## Installation

```bash
$ composer require jolicode/php-os-helper
```

## Usage

```php
<?php

use JoliCode\PhpOsHelper\OsHelper;

OsHelper::isUnix(); // true or false
OsHelper::isWindows(); // true or false
OsHelper::isWindowsSeven(); // true or false
OsHelper::isWindowsEightOrHigher(); // true or false
OsHelper::isWindowsSubsystemForLinux(); // true or false
OsHelper::isMacOs(); // true or false
OsHelper::getMacOSVersion(); // 10.15.7
```

## Notes

This package contains helpers extracted from https://github.com/jolicode/JoliNotif
to make them standalone.
