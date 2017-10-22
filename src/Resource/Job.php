<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Hydrator\Annotation\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;
use DateTimeInterface;

/**
 * @EmptyResource("EmptyJob")
 */
abstract class Job extends AbstractResource implements JobInterface
{
    /**
     * @var int
     */
    protected $jobId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $allowFailure;

    /**
     * @var int
     */
    protected $messagesCount;

    /**
     * @var int
     */
    protected $compilationMessagesCount;

    /**
     * @var int
     */
    protected $compilationErrorsCount;

    /**
     * @var int
     */
    protected $compilationWarningsCount;

    /**
     * @var int
     */
    protected $testsCount;

    /**
     * @var int
     */
    protected $passedTestsCount;

    /**
     * @var int
     */
    protected $failedTestsCount;

    /**
     * @var int
     */
    protected $artifactsCount;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var DateTimeInterface
     */
    protected $started;

    /**
     * @var DateTimeInterface
     */
    protected $finished;

    /**
     * @var DateTimeInterface
     */
    protected $created;

    /**
     * @var DateTimeInterface
     */
    protected $updated;

    /**
     * @return int
     */
    public function jobId(): int
    {
        return $this->jobId;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function allowFailure(): bool
    {
        return $this->allowFailure;
    }

    /**
     * @return int
     */
    public function messagesCount(): int
    {
        return $this->messagesCount;
    }

    /**
     * @return int
     */
    public function compilationMessagesCount(): int
    {
        return $this->compilationMessagesCount;
    }

    /**
     * @return int
     */
    public function compilationErrorsCount(): int
    {
        return $this->compilationErrorsCount;
    }

    /**
     * @return int
     */
    public function compilationWarningsCount(): int
    {
        return $this->compilationWarningsCount;
    }

    /**
     * @return int
     */
    public function testsCount(): int
    {
        return $this->testsCount;
    }

    /**
     * @return int
     */
    public function passedTestsCount(): int
    {
        return $this->passedTestsCount;
    }

    /**
     * @return int
     */
    public function failedTestsCount(): int
    {
        return $this->failedTestsCount;
    }

    /**
     * @return int
     */
    public function artifactsCount(): int
    {
        return $this->artifactsCount;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * @return DateTimeInterface
     */
    public function started(): DateTimeInterface
    {
        return $this->started;
    }

    /**
     * @return DateTimeInterface
     */
    public function finished(): DateTimeInterface
    {
        return $this->finished;
    }

    /**
     * @return DateTimeInterface
     */
    public function created(): DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @return DateTimeInterface
     */
    public function updated(): DateTimeInterface
    {
        return $this->updated;
    }
}
