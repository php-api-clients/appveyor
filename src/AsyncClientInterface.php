<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor;

use React\Promise\PromiseInterface;
use Rx\ObservableInterface;

interface AsyncClientInterface
{
    public function projects(): ObservableInterface;

    public function project(string $repository): PromiseInterface;

    public function hasProject(string $provider, string $repository): PromiseInterface;

    public function addProject(string $provider, string $repository): PromiseInterface;
}
