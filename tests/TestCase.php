<?php
declare(strict_types=1);

namespace ApiClients\Tests\AppVeyor;

use GeneratedHydrator\Configuration;
use Phake;
use ApiClients\Foundation\Transport\Client;
use ApiClients\Foundation\Transport\Hydrator;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    /**
     * @var string
     */
    private $tmpDir;

    /**
     * @var string
     */
    private $tmpNamespace;

    public function setUp()
    {
        parent::setUp();
        $this->tmpDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('wyrihaximus-php-appveyor-client-tests-') . DIRECTORY_SEPARATOR;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $this->tmpDir = 'C:\\temp\\';
        }
        mkdir($this->tmpDir, 0777, true);
        $this->tmpNamespace = Configuration::DEFAULT_GENERATED_CLASS_NAMESPACE . uniqid('WHPAV');
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->rmdir($this->tmpDir);
    }

    protected function rmdir($dir)
    {
        $directory = dir($dir);
        while (false !== ($entry = $directory->read())) {
            if (in_array($entry, ['.', '..'])) {
                continue;
            }

            if (is_dir($dir . $entry)) {
                $this->rmdir($dir . $entry . DIRECTORY_SEPARATOR);
                continue;
            }

            if (is_file($dir . $entry)) {
                unlink($dir . $entry);
                continue;
            }
        }
        $directory->close();
        rmdir($dir);
    }

    protected function getTmpDir(): string
    {
        return $this->tmpDir;
    }

    protected function getRandomNameSpace(): string
    {
        return $this->tmpNamespace;
    }

    public function hydrate($class, $json, $namespace)
    {
        return (new Hydrator(Phake::mock(Client::class), [
            'resource_namespace' => $namespace,
            'resource_hydrator_cache_dir' => $this->getTmpDir(),
            'resource_hydrator_namespace' => $this->getRandomNameSpace(),
        ]))->hydrateFQCN($class, $json);
    }
}
