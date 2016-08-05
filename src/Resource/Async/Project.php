<?php
declare(strict_types=1);

namespace ApiClients\AppVeyor\Resource\Async;

use Rx\Observable;
use ApiClients\AppVeyor\Resource\Project as BaseProject;
use function React\Promise\resolve;

class Project extends BaseProject
{
}
