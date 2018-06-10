<?php

declare(strict_types=1);

namespace Core\Exception;

use RuntimeException;

/**
 * Class TODOException.
 */
class TODO extends RuntimeException
{
    /**
     * TODOException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct($message);
    }
}
