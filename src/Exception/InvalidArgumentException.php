<?php

declare(strict_types=1);

namespace Core\Exception;

use DomainException;

/**
 * Class InvalidArgumentException.
 */
class InvalidArgumentException extends DomainException
{
    /**
     * InvalidParamException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
