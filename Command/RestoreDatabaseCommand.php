<?php

namespace Melodia\UtilBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class RestoreDatabaseCommand
 *
 * @package Melodia\UtilBundle\Command
 */
class RestoreDatabaseCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('melodia:restore:database')
            ->setDescription('Empties, then fills the database with data.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getApplication();
        $app->setAutoExit(false);

        $app->run(new ArrayInput(array(
                'command' => 'doctrine:schema:drop',
                '--force' => true,
            )),
            $output
        );

        $app->run(new ArrayInput(array(
                'command' => 'doctrine:schema:create',
            )),
            $output
        );
        $app->run(new ArrayInput(array(
                'command' => 'doctrine:cache:clear-metadata',
            )),
            $output
        );

        $app->run(new ArrayInput(array(
                'command' => 'doctrine:cache:clear-query',
            )),
            $output
        );

        $app->run(new ArrayInput(array(
                'command' => 'doctrine:cache:clear-result',
            )),
            $output
        );

        $app->run(new ArrayInput(array(
                'command' => 'doctrine:fixtures:load',
                '--no-interaction' => null,
            )),
            $output
        );
    }
}

