<?php
declare(strict_types=1);

namespace ApiClients\AppVeyor\Resource;

use DateTimeInterface;
use ApiClients\Foundation\Resource\ResourceInterface;

/**
 * @link http://www.appveyor.com/docs/api/projects-builds#get-project-last-build
 */
interface ProjectInterface extends ResourceInterface
{
    public function projectId() : int;

    public function accountId() : int;

    public function accountName() : int;

    public function builds() : array;

    public function name() : string;

    public function slug() : string;

    public function repositoryType() : string;

    public function repositoryScm() : string;

    public function repositoryName() : string;

    public function repositoryBranch() : string;

    public function isPrivate() : bool;

    public function skipBranchesWithoutAppveyorYml() : bool;

    public function enableSecureVariablesInPullRequests() : bool;

    public function enableDeploymentInPullRequests() : bool;

    public function rollingBuilds() : bool;

    public function alwaysBuildClosedPullRequests() : bool;

    public function nuGetFeed() : array;

    public function securityDescriptor() : array;

    public function created() : DateTimeInterface;

    public function updated() : DateTimeInterface;
}
