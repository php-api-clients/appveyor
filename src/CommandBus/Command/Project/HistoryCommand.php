<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\CommandBus\Command\Project;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\AppVeyor\CommandBus\Handler\Project\HistoryHandler")
 */
final class HistoryCommand
{
    /**
     * @var string
     */
    private $accountName;

    /**
     * @var string
     */
    private $projectSlug;

    /**
     * LatestBuildCommand constructor.
     * @param string $accountName
     * @param string $projectSlug
     */
    public function __construct($accountName, $projectSlug)
    {
        $this->accountName = $accountName;
        $this->projectSlug = $projectSlug;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @return string
     */
    public function getProjectSlug(): string
    {
        return $this->projectSlug;
    }
}
