<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;
use DateTimeInterface;

interface JobInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Job';

    /**
     * @return int
     */
    public function jobId(): int;

    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return bool
     */
    public function allowFailure(): bool;

    /**
     * @return int
     */
    public function messagesCount(): int;

    /**
     * @return int
     */
    public function compilationMessagesCount(): int;

    /**
     * @return int
     */
    public function compilationErrorsCount(): int;

    /**
     * @return int
     */
    public function compilationWarningsCount(): int;

    /**
     * @return int
     */
    public function testsCount(): int;

    /**
     * @return int
     */
    public function passedTestsCount(): int;

    /**
     * @return int
     */
    public function failedTestsCount(): int;

    /**
     * @return int
     */
    public function artifactsCount(): int;

    /**
     * @return string
     */
    public function status(): string;

    /**
     * @return DateTimeInterface
     */
    public function started(): DateTimeInterface;

    /**
     * @return DateTimeInterface
     */
    public function finished(): DateTimeInterface;

    /**
     * @return DateTimeInterface
     */
    public function created(): DateTimeInterface;

    /**
     * @return DateTimeInterface
     */
    public function updated(): DateTimeInterface;
}
