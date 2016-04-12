<?php

namespace Valiton\Bundle\ShariffBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ValitonShariffExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('valiton_shariff.shariff_config.domain', $config['domain']);
        $container->setParameter('valiton_shariff.shariff_config.force_protocol', $config['force_protocol']);
        $container->setParameter('valiton_shariff.shariff_config.cache', $config['cache']);
        $container->setParameter('valiton_shariff.shariff_config.services', $config['services']);
        $container->setParameter('valiton_shariff.shariff_config.client', $config['client']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
