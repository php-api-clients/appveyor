<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Hydrator\Annotation\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;
use DateTimeInterface;

/**
 * @EmptyResource("EmptyProject")
 */
abstract class Project extends AbstractResource implements ProjectInterface
{
    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var int
     */
    protected $accountId;

    /**
     * @var int
     */
    protected $accountName;

    /**
     * @var array
     */
    protected $builds;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $repositoryType;

    /**
     * @var string
     */
    protected $repositoryScm;

    /**
     * @var string
     */
    protected $repositoryName;

    /**
     * @var string
     */
    protected $repositoryBranch;

    /**
     * @var bool
     */
    protected $isPrivate;

    /**
     * @var bool
     */
    protected $skipBranchesWithoutAppveyorYml;

    /**
     * @var bool
     */
    protected $enableSecureVariablesInPullRequests;

    /**
     * @var bool
     */
    protected $enableDeploymentInPullRequests;

    /**
     * @var bool
     */
    protected $rollingBuilds;

    /**
     * @var bool
     */
    protected $alwaysBuildClosedPullRequests;

    /**
     * @var array
     */
    protected $nuGetFeed;

    /**
     * @var array
     */
    protected $securityDescriptor;

    /**
     * @var DateTimeInterface
     */
    protected $created;

    /**
     * @var DateTimeInterface
     */
    protected $updated;

    /**
     * @return int
     */
    public function projectId(): int
    {
        return $this->projectId;
    }

    /**
     * @return int
     */
    public function accountId(): int
    {
        return $this->accountId;
    }

    /**
     * @return int
     */
    public function accountName(): int
    {
        return $this->accountName;
    }

    /**
     * @return array
     */
    public function builds(): array
    {
        return $this->builds;
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
    public function slug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function repositoryType(): string
    {
        return $this->repositoryType;
    }

    /**
     * @return string
     */
    public function repositoryScm(): string
    {
        return $this->repositoryScm;
    }

    /**
     * @return string
     */
    public function repositoryName(): string
    {
        return $this->repositoryName;
    }

    /**
     * @return string
     */
    public function repositoryBranch(): string
    {
        return $this->repositoryBranch;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }

    /**
     * @return bool
     */
    public function skipBranchesWithoutAppveyorYml(): bool
    {
        return $this->skipBranchesWithoutAppveyorYml;
    }

    /**
     * @return bool
     */
    public function enableSecureVariablesInPullRequests(): bool
    {
        return $this->enableSecureVariablesInPullRequests;
    }

    /**
     * @return bool
     */
    public function enableDeploymentInPullRequests(): bool
    {
        return $this->enableDeploymentInPullRequests;
    }

    /**
     * @return bool
     */
    public function rollingBuilds(): bool
    {
        return $this->rollingBuilds;
    }

    /**
     * @return bool
     */
    public function alwaysBuildClosedPullRequests(): bool
    {
        return $this->alwaysBuildClosedPullRequests;
    }

    /**
     * @return array
     */
    public function nuGetFeed(): array
    {
        return $this->nuGetFeed;
    }

    /**
     * @return array
     */
    public function securityDescriptor(): array
    {
        return $this->securityDescriptor;
    }

    /**
     * @return DateTimeInterface
     */
    public function created(): DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @return DateTimeInterface
     */
    public function updated(): DateTimeInterface
    {
        return $this->updated;
    }
}
