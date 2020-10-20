<?php

declare(strict_types=1);

namespace TYPO3\CMS\Core\Utility;

if (class_exists(GeneralUtility::class)) {
    return;
}

class GeneralUtility
{
    public static function getApplicationContext(): void
    {
    }

    /**
     * @return object
     */
    public static function makeInstance(string $class)
    {
        return new $class();
    }

    public static function getUserObj(string $class): void
    {

    }

    public static function getIndpEnv(string $var): string
    {
        return 'foo';
    }

    public static function mkdir_deep(string $folder)
    {
        return 'foo';
    }

    public static function explodeUrl2Array($string, $multidim = null): string
    {
        return 'foo';
    }

    public static function logDeprecatedFunction(): string
    {
        return 'foo';
    }

    public static function logDeprecatedViewHelperAttribute(): string
    {
        return 'foo';
    }

    public static function deprecationLog(string $message): string
    {
        return $message ?? '';
    }

    public static function getDeprecationLogFileName(): string
    {
        return 'foo';
    }

    public static function makeInstanceService($serviceType, $serviceSubType = '', $excludeServiceKeys = []): string
    {
        return 'foo';
    }

    public static function trimExplode($delim, $string, $removeEmptyValues = false, $limit = 0): array
    {
        $result = explode($delim, $string);
        if ($removeEmptyValues) {
            $temp = [];
            foreach ($result as $value) {
                if (trim($value) !== '') {
                    $temp[] = $value;
                }
            }
            $result = $temp;
        }
        if ($limit > 0 && count($result) > $limit) {
            $lastElements = array_splice($result, $limit - 1);
            $result[] = implode($delim, $lastElements);
        } elseif ($limit < 0) {
            $result = array_slice($result, 0, $limit);
        }
        $result = array_map('trim', $result);

        return $result;
    }

    public static function idnaEncode($value): string
    {
        return 'foo';
    }

    public static function isRunningOnCgiServerApi(): bool
    {
        return false;
    }

    public static function getUrl($url): void
    {

    }

    public static function IPv6Hex2Bin(string $hex): string
    {
        return '';
    }

    public static function IPv6Bin2Hex(string $bin): string
    {
        return '';
    }

    public static function compressIPv6(string $address): string
    {
        return '';
    }

    public static function milliseconds(): int
    {
        return 1;
    }

    public static function verifyFilenameAgainstDenyPattern($filename): void
    {

    }
}
