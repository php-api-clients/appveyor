<?php
declare(strict_types=1);

namespace ApiClients\Client\AppVeyor\Resource\Request\Project;

use InvalidArgumentException;
use ApiClients\AppVeyor\Resource\Request\RequestTrait;

class Add
{
    use RequestTrait;

    /**
     * Supported repository providers
     */
    const SUPPORTED_PROVIDERS = [
        'gitHub',
        'bitBucket',
        'vso',
        'gitLab',
        'kiln',
        'stash',
        'git',
        'mercurial',
        'subversion',
    ];

    protected $method = 'POST';
    protected $path = '/api/projects';

    /**
     * @var string
     */
    private $repositoryProvider;

    /**
     * @var string
     */
    private $repositoryName;

    /**
     * Add constructor.
     * @param string $repositoryProvider
     * @param string $repositoryName
     * @throws InvalidArgumentException
     */
    public function __construct(string $repositoryProvider, string $repositoryName)
    {
        if (!in_array($repositoryProvider, self::SUPPORTED_PROVIDERS)) {
            throw new InvalidArgumentException();
        }

        $this->repositoryProvider = $repositoryProvider;
        $this->repositoryName = $repositoryName;
    }

    public function repositoryProvider(): string
    {
        return $this->repositoryProvider;
    }

    public function repositoryName(): string
    {
        return $this->repositoryName;
    }

    protected function requestBody(): array
    {
        return [
            'repositoryProvider' => $this->repositoryProvider,
            'repositoryName' => $this->repositoryName,
        ];
    }
}
