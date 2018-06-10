<?php

declare(strict_types=1);

namespace Core\Exception;

use RuntimeException;

/**
 * Class InvalidClassNameException.
 */
class InvalidClassNameException extends RuntimeException
{
    /**
     * InvalidClassNameException constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
        parent::__construct("Class '{$class}' does not exist.");
    }
}
