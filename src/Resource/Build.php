<?php declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource;

use ApiClients\Foundation\Hydrator\Annotation\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;
use DateTimeInterface;

/**
 * @EmptyResource("EmptyBuild")
 */
abstract class Build extends AbstractResource implements BuildInterface
{
    /**
     * @var int
     */
    protected $buildId;

    /**
     * @var int
     */
    protected $buildNumber;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $branch;

    /**
     * @var string
     */
    protected $commitId;

    /**
     * @var string
     */
    protected $authorName;

    /**
     * @var string
     */
    protected $authorUserName;

    /**
     * @var string
     */
    protected $comitterName;

    /**
     * @var string
     */
    protected $comitterUserName;

    /**
     * @var DateTimeInterface
     */
    protected $comitted;

    /**
     * @var array
     */
    protected $messages;

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
    public function buildId(): int
    {
        return $this->buildId;
    }

    /**
     * @return int
     */
    public function buildNumber(): int
    {
        return $this->buildNumber;
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function branch(): string
    {
        return $this->branch;
    }

    /**
     * @return string
     */
    public function commitId(): string
    {
        return $this->commitId;
    }

    /**
     * @return string
     */
    public function authorName(): string
    {
        return $this->authorName;
    }

    /**
     * @return string
     */
    public function authorUserName(): string
    {
        return $this->authorUserName;
    }

    /**
     * @return string
     */
    public function comitterName(): string
    {
        return $this->comitterName;
    }

    /**
     * @return string
     */
    public function comitterUserName(): string
    {
        return $this->comitterUserName;
    }

    /**
     * @return DateTimeInterface
     */
    public function comitted(): DateTimeInterface
    {
        return $this->comitted;
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return $this->messages;
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
