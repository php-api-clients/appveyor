<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;
use DateTimeInterface;

abstract class EmptyBuild implements BuildInterface, EmptyResourceInterface
{
    /**
     * @return int
     */
    public function buildId(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function buildNumber(): int
    {
        return null;
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function branch(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function commitId(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function authorName(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function authorUserName(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function comitterName(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function comitterUserName(): string
    {
        return null;
    }

    /**
     * @return DateTimeInterface
     */
    public function comitted(): DateTimeInterface
    {
        return null;
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return null;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return null;
    }

    /**
     * @return DateTimeInterface
     */
    public function started(): DateTimeInterface
    {
        return null;
    }

    /**
     * @return DateTimeInterface
     */
    public function finished(): DateTimeInterface
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
