<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;
use DateTimeInterface;

interface BuildInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Build';

    /**
     * @return int
     */
    public function buildId(): int;

    /**
     * @return int
     */
    public function buildNumber(): int;

    /**
     * @return string
     */
    public function version(): string;

    /**
     * @return string
     */
    public function message(): string;

    /**
     * @return string
     */
    public function branch(): string;

    /**
     * @return string
     */
    public function commitId(): string;

    /**
     * @return string
     */
    public function authorName(): string;

    /**
     * @return string
     */
    public function authorUserName(): string;

    /**
     * @return string
     */
    public function comitterName(): string;

    /**
     * @return string
     */
    public function comitterUserName(): string;

    /**
     * @return DateTimeInterface
     */
    public function comitted(): DateTimeInterface;

    /**
     * @return array
     */
    public function messages(): array;

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
