<?php

declare(strict_types=1);

namespace Core\Worker;

use Core\Common\Assert;

/**
 * Class Channel.
 */
class Channel
{
    /**
     * @var string
     */
    private $name;

    /**
     * Tube constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->guard();
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    private function guard(): void
    {
        Assert::utf8($this->name());
    }
}
