<?php

declare(strict_types=1);

namespace Core\Common;

use Core\Exception\InvalidClassNameException;
use Core\Exception\InvalidUtf8CodificationException;

/**
 * Class Assert.
 */
class Assert
{
    /**
     * @param string $str
     */
    public static function utf8(string $str): void
    {
        if (!preg_match('//u', $str)) {
            throw new InvalidUtf8CodificationException($str);
        }
    }

    /**
     * @param string $class
     */
    public static function classExist(string $class): void
    {
        if (!class_exists($class)) {
            throw new InvalidClassNameException($class);
        }
    }
}
