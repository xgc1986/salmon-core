<?php

declare(strict_types=1);

namespace Core\Worker;

use Serializable;

/**
 * Interface Worker.
 */
interface Worker
{
    /**
     * @param Channel      $channel
     * @param Serializable $payload
     * @param ProducerTube $tube
     */
    public function push(Channel $channel, Serializable $payload, ProducerTube $tube): void;

    /**
     * @param Channel      $channel
     * @param ConsumerTube $tube
     *
     * @return Serializable
     */
    public function pop(Channel $channel, ConsumerTube $tube): Serializable;
}
