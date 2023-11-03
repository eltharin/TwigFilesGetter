<?php

namespace Eltharin\TwigFilesGetterBundle;

use Eltharin\TwigFilesGetterBundle\Twig\FileGetterExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class EltharinTwigFilesGetterBundle extends AbstractBundle
{
	public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
	{
		$container->services()
				->set(FileGetterExtension::class)
				->tag('twig.extension')
			;
	}
}
