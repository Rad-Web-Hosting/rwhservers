<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\CommandLine;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ModuleConstants;

class Application extends \Symfony\Component\Console\Application
{
    protected $dir = '';

    /**
     * Run the console application and register command providers.
     *
     * @param InputInterface|null $input
     * @param OutputInterface|null $output
     * @return int|void
     */
    public function run(?InputInterface $input = null, ?OutputInterface $output = null):int
    {
        $this->loadCommandsControllers($this->getCommands());

        parent::run();
    }

    /**
     * Get all available files
     * @return array
     */
    protected function getCommands()
    {
        $files    = glob(ModuleConstants::getFullPath('app', $this->dir) . '/*.php');
        $commands = [];

        foreach ($files as $file)
        {
            $file = substr($file, strrpos($file, DIRECTORY_SEPARATOR) + 1);
            $file = substr($file, 0, strrpos($file, '.'));

            $commands[] = $file;
        }

        return $commands;
    }

    /**
     * Create new objects and add it
     * @param $commands
     */
    protected function loadCommandsControllers($commands)
    {
        foreach ($commands as $command)
        {
            $class = ModuleConstants::getRootNamespace() . '\App\\' . $this->dir . '\\' . $command;

            $this->add(new $class);
        }
    }
}