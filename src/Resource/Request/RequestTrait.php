<?php
declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Request;

trait RequestTrait
{
    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }
}
