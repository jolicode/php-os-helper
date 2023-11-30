<?php

namespace JoliCode\PhpOsHelper;

class OsHelper
{
    private static string $kernelName;
    private static string $kernelVersion;
    private static string $macOSVersion;

    public static function isUnix(): bool
    {
        return '/' === \DIRECTORY_SEPARATOR;
    }

    public static function isWindowsSubsystemForLinux(): bool
    {
        return self::isUnix() && false !== mb_strpos(strtolower(php_uname()), 'microsoft');
    }

    public static function isWindows(): bool
    {
        return '\\' === \DIRECTORY_SEPARATOR;
    }

    public static function isWindowsSeven(): bool
    {
        if (!isset(self::$kernelVersion)) {
            self::$kernelVersion = php_uname('r');
        }

        return '6.1' === self::$kernelVersion;
    }

    public static function isWindowsEightOrHigher(): bool
    {
        if (!isset(self::$kernelVersion)) {
            self::$kernelVersion = php_uname('r');
        }

        return version_compare(self::$kernelVersion, '6.2', '>=');
    }

    public static function isMacOS(): bool
    {
        if (!isset(self::$kernelName)) {
            self::$kernelName = php_uname('s');
        }

        return str_contains(self::$kernelName, 'Darwin');
    }

    public static function getMacOSVersion(): string
    {
        if (!isset(self::$macOSVersion)) {
            $output = exec('sw_vers -productVersion 2>/dev/null');
            self::$macOSVersion = trim($output ?: '');
        }

        return self::$macOSVersion;
    }
}
