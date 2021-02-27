<?php
namespace CodeIgniter\Commands;

use CodeIgniter\Test\CIUnitTestCase;
use Tests\Support\Commands\AppInfo;
use CodeIgniter\CLI\CommandRunner;
use Config\Services;

class BaseCommandTest extends CIUnitTestCase
{
	protected $logger;
	protected $runner;

	protected function setUp(): void
	{
		parent::setUp();
		$this->logger = Services::logger();
		$this->runner = new CommandRunner();
	}

	public function testMagicIssetTrue()
	{
		$command = new AppInfo($this->logger, service('commands'));

		$this->assertTrue(isset($command->group));
	}

	public function testMagicIssetFalse()
	{
		$command = new AppInfo($this->logger, service('commands'));

		$this->assertFalse(isset($command->foobar));
	}

	public function testMagicGet()
	{
		$command = new AppInfo($this->logger, service('commands'));

		$this->assertEquals('demo', $command->group);
	}

	public function testMagicGetMissing()
	{
		$command = new AppInfo($this->logger, service('commands'));

		$this->assertNull($command->foobar);
	}
}
