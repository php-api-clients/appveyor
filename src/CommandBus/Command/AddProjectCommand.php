<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Command;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\AppVeyor\CommandBus\Handler\AddProjectHandler")
 */
final class AddProjectCommand
{
    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $repository;

    /**
     * @param string $provider
     * @param string $repository
     */
    public function __construct(string $provider, string $repository)
    {
        $this->provider = $provider;
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @return string
     */
    public function getRepository(): string
    {
        return $this->repository;
    }
}
