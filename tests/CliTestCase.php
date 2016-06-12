<?php
namespace Phwoolcon\Tests;

use Phwoolcon\Cli;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;

class CliTestCase extends TestCase
{
    /**
     * @var \Symfony\Component\Console\Application
     */
    protected $cli;
    /**
     * @var BufferedOutput
     */
    protected $output;

    public function setUp()
    {
        parent::setUp();
        $_SERVER['PHWOOLCON_MIGRATION_PATH'] = TEST_ROOT_PATH . '/bin/migrations';
        $this->cli = Cli::register($this->di);
        $this->output = new BufferedOutput();
    }

    protected function runCommand($command, $arguments = [])
    {
        $this->cli->run(new ArgvInput(array_merge([
            'cli',
            $command,
        ], $arguments)), $this->output);
        return $this->output->fetch();
    }
}
