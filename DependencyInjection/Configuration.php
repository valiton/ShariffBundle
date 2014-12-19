<?php

namespace Valiton\Bundle\ShariffBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('valiton_shariff');

        $rootNode
            ->children()
                ->scalarNode('domain')->isRequired()->end()
                ->arrayNode('cache')
                    ->children()
                        ->scalarNode('cacheDir')->defaultNull()->end()
                        ->scalarNode('ttl')->defaultValue(1800)->end()
                    ->end()
                ->end()
                ->arrayNode('services')
                    ->prototype('scalar')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
