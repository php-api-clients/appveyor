<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;
use DateTimeInterface;

interface ProjectInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Project';

    /**
     * @return int
     */
    public function projectId() : int;

    /**
     * @return int
     */
    public function accountId() : int;

    /**
     * @return int
     */
    public function accountName() : int;

    /**
     * @return array
     */
    public function builds() : array;

    /**
     * @return string
     */
    public function name() : string;

    /**
     * @return string
     */
    public function slug() : string;

    /**
     * @return string
     */
    public function repositoryType() : string;

    /**
     * @return string
     */
    public function repositoryScm() : string;

    /**
     * @return string
     */
    public function repositoryName() : string;

    /**
     * @return string
     */
    public function repositoryBranch() : string;

    /**
     * @return bool
     */
    public function isPrivate() : bool;

    /**
     * @return bool
     */
    public function skipBranchesWithoutAppveyorYml() : bool;

    /**
     * @return bool
     */
    public function enableSecureVariablesInPullRequests() : bool;

    /**
     * @return bool
     */
    public function enableDeploymentInPullRequests() : bool;

    /**
     * @return bool
     */
    public function rollingBuilds() : bool;

    /**
     * @return bool
     */
    public function alwaysBuildClosedPullRequests() : bool;

    /**
     * @return array
     */
    public function nuGetFeed() : array;

    /**
     * @return array
     */
    public function securityDescriptor() : array;

    /**
     * @return DateTimeInterface
     */
    public function created() : DateTimeInterface;

    /**
     * @return DateTimeInterface
     */
    public function updated() : DateTimeInterface;
}
