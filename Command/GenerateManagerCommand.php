<?php

namespace L91\Sulu\Bundle\BackendBundle\Command;

use L91\Sulu\Bundle\BackendBundle\Generator\SuluManagerGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateManagerCommand extends AbstractGenerateCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('l91:sulu:backend:generate:manager')
            ->setDescription('Will create a manager for a specific entity.')
            ->addArgument('entity', InputArgument::REQUIRED, 'Enter your entity e.g.: AcmeBlogBundle:Post')
            ->addOption('extended', 'ex', InputOption::VALUE_NONE, 'Generate extended classes')
            ->addOption('service-format', 'sf', InputOption::VALUE_REQUIRED, 'Set the format of service registrations.')
            ->addOption('route-format', 'rf', InputOption::VALUE_REQUIRED, 'Set the format of route registrations.')
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force Overwrite');
    }

    /**
     * @return SuluManagerGenerator
     */
    protected function createGenerator()
    {
        return new SuluManagerGenerator($this->getContainer()->get('filesystem'));
    }

    /**
     * {@inheritdoc}
     */
    protected function getRegistrationMessage()
    {
        return 'Manager generated, register the manager with: ';
    }
}
