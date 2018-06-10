<?php

declare(strict_types=1);

namespace Core\Exception;

/**
 * Class InvalidUtf8CodificationException.
 */
class InvalidUtf8CodificationException extends InvalidArgumentException
{
    /**
     * InvalidUtf8CodificationException constructor.
     *
     * @param string $str
     */
    public function __construct(string $str)
    {
        parent::__construct("Invalid utf-8 encoding for '{$str}'.");
    }
}
