<?php
declare(strict_types=1);

namespace WyriHaximus\AppVeyor\Resource\Sync;

use Rx\Observable;
use Rx\React\Promise;
use WyriHaximus\AppVeyor\Resource\Project as BaseProject;
use function Clue\React\Block\await;
use function React\Promise\resolve;

class Project extends BaseProject
{
}
