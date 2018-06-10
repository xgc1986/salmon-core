<?php

declare(strict_types=1);

namespace Core\Worker;

use Core\Common\Assert;

/**
 * Class ProducerTube.
 */
class ProducerTube
{
    /**
     * @var string
     */
    private $name;

    /**
     * ProducerTube constructor.
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

    /**
     * Validates Tube.
     */
    protected function guard(): void
    {
        Assert::utf8($this->name());
    }
}
