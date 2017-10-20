<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;
use DateTimeInterface;

abstract class EmptyProject implements ProjectInterface, EmptyResourceInterface
{
    /**
     * @return int
     */
    public function projectId(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function accountId(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function accountName(): int
    {
        return null;
    }

    /**
     * @return array
     */
    public function builds(): array
    {
        return null;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function slug(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function repositoryType(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function repositoryScm(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function repositoryName(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function repositoryBranch(): string
    {
        return null;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return null;
    }

    /**
     * @return bool
     */
    public function skipBranchesWithoutAppveyorYml(): bool
    {
        return null;
    }

    /**
     * @return bool
     */
    public function enableSecureVariablesInPullRequests(): bool
    {
        return null;
    }

    /**
     * @return bool
     */
    public function enableDeploymentInPullRequests(): bool
    {
        return null;
    }

    /**
     * @return bool
     */
    public function rollingBuilds(): bool
    {
        return null;
    }

    /**
     * @return bool
     */
    public function alwaysBuildClosedPullRequests(): bool
    {
        return null;
    }

    /**
     * @return array
     */
    public function nuGetFeed(): array
    {
        return null;
    }

    /**
     * @return array
     */
    public function securityDescriptor(): array
    {
        return null;
    }

    /**
     * @return DateTimeInterface
     */
    public function created(): DateTimeInterface
    {
        return null;
    }

    /**
     * @return DateTimeInterface
     */
    public function updated(): DateTimeInterface
    {
        return null;
    }
}
