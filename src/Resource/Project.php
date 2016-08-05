<?php
declare(strict_types=1);

namespace ApiClients\AppVeyor\Resource;

use DateTimeInterface;
use ApiClients\Foundation\Resource\TransportAwareTrait;

abstract class Project implements ProjectInterface
{
    use TransportAwareTrait;

    protected $projectId;

    protected $accountId;

    protected $accountName;

    protected $builds;

    protected $name;

    protected $slug;

    protected $repositoryType;

    protected $repositoryScm;

    protected $repositoryName;

    protected $repositoryBranch;

    protected $isPrivate;

    protected $skipBranchesWithoutAppveyorYml;

    protected $enableSecureVariablesInPullRequests;

    protected $enableDeploymentInPullRequests;

    protected $rollingBuilds;

    protected $alwaysBuildClosedPullRequests;

    protected $nuGetFeed;

    protected $securityDescriptor;

    protected $created;

    protected $updated;

    public function projectId() : int
    {
        return $this->projectId;
    }

    public function accountId() : int
    {
        return $this->accountId;
    }

    public function accountName() : int
    {
        return $this->accountName;
    }

    public function builds() : array
    {
        return $this->builds;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function slug() : string
    {
        return $this->slug;
    }

    public function repositoryType() : string
    {
        return $this->repositoryType;
    }

    public function repositoryScm() : string
    {
        return $this->repositoryScm;
    }

    public function repositoryName() : string
    {
        return $this->repositoryName;
    }

    public function repositoryBranch() : string
    {
        return $this->repositoryBranch;
    }

    public function isPrivate() : bool
    {
        return $this->isPrivate;
    }

    public function skipBranchesWithoutAppveyorYml() : bool
    {
        return $this->skipBranchesWithoutAppveyorYml;
    }

    public function enableSecureVariablesInPullRequests() : bool
    {
        return $this->enableSecureVariablesInPullRequests;
    }

    public function enableDeploymentInPullRequests() : bool
    {
        return $this->enableDeploymentInPullRequests;
    }

    public function rollingBuilds() : bool
    {
        return $this->rollingBuilds;
    }

    public function alwaysBuildClosedPullRequests() : bool
    {
        return $this->alwaysBuildClosedPullRequests;
    }

    public function nuGetFeed() : array
    {
        return $this->nuGetFeed;
    }

    public function securityDescriptor() : array
    {
        return $this->securityDescriptor;
    }

    public function created() : DateTimeInterface
    {
        return $this->created;
    }

    public function updated() : DateTimeInterface
    {
        return $this->updated;
    }

    public function refresh()
    {
        // To Do
    }
}
