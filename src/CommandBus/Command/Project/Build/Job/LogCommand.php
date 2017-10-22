<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Command\Project\Build\Job;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\AppVeyor\CommandBus\Handler\Project\Build\Job\LogHandler")
 */
final class LogCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * LogCommand constructor.
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
