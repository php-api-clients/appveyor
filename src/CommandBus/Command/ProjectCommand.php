<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Command;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\AppVeyor\CommandBus\Handler\ProjectHandler")
 */
final class ProjectCommand
{
    /**
     * @var string
     */
    private $repository;

    /**
     * @param string $repository
     */
    public function __construct(string $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function getRepository(): string
    {
        return $this->repository;
    }
}
