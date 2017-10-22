<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;
use DateTimeInterface;

abstract class EmptyJob implements JobInterface, EmptyResourceInterface
{
    /**
     * @return int
     */
    public function jobId(): int
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
     * @return bool
     */
    public function allowFailure(): bool
    {
        return null;
    }

    /**
     * @return int
     */
    public function messagesCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function compilationMessagesCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function compilationErrorsCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function compilationWarningsCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function testsCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function passedTestsCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function failedTestsCount(): int
    {
        return null;
    }

    /**
     * @return int
     */
    public function artifactsCount(): int
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
