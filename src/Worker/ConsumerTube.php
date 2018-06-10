<?php

declare(strict_types=1);

namespace Core\Worker;

use Core\Common\Assert;

/**
 * Class ConsumerTube.
 */
class ConsumerTube
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $class;

    /**
     * ConsumerTube constructor.
     *
     * @param string $name
     * @param string $class
     */
    public function __construct(string $name, string $class)
    {
        $this->name = $name;
        $this->class = $class;
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
     * @return string
     */
    public function class(): string
    {
        return $this->class;
    }

    /**
     * Validates Tube.
     */
    protected function guard(): void
    {
        Assert::classExist($this->class());
        Assert::utf8($this->name());
    }
}
