<?php

declare(strict_types=1);

namespace Core\Worker;

use Pheanstalk\Pheanstalk;
use ReflectionClass;
use ReflectionException;
use RuntimeException;
use Serializable;

/**
 * Class BeanstalkWorker.
 */
abstract class BeanstalkWorker implements Worker
{
    protected $beanstalk;

    /**
     * BeanstalkWorker constructor.
     *
     * @param string $host
     * @param string $port
     */
    public function __construct(string $host, string $port)
    {
        $this->beanstalk = new Pheanstalk($host, $port);
    }

    /**
     * @param Channel      $channel
     * @param Serializable $payload
     * @param ProducerTube $tube
     */
    public function push(Channel $channel, Serializable $payload, ProducerTube $tube): void
    {
        $this->beanstalk
            ->useTube($tube->name())
            ->put($payload->serialize());
    }

    /**
     * @param Channel      $channel
     * @param ConsumerTube $tube
     *
     * @return Serializable
     */
    public function pop(Channel $channel, ConsumerTube $tube): Serializable
    {
        $rawMessage = $this->beanstalk
            ->useTube($tube->name())
            ->ignore('default')
            ->reserve();

        try {
            $reflectedInstance = new ReflectionClass($tube->class());
            /** @var Serializable $instance */
            $instance = $reflectedInstance->newInstanceWithoutConstructor();
            $instance->unserialize($rawMessage);

            return $instance;
        } catch (ReflectionException $e) {
            throw new RuntimeException($e);
        }
    }
}
