<?php

/* MIT License

Copyright (c) 2018 Eridan Domoratskiy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. */

namespace MaintenanceScreen;

use Symfony\Component\Config\FileLocator;

use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Exception\Exception as ConfigException;

use MaintenanceScreen\ConfigurationLoaders\YamlConfigurationLoader;

/**
 * Configuraion loader
 *
 * @author ProgMiner
 */
class ConfigurationLoader {

    /**
     * @var FileLocator File locator
     */
    protected $fileLocator;

    /**
     * @var LoaderResolver Resolver
     */
    protected $resolver;

    /**
     * @var DelegatingLoader Loader
     */
    protected $loader;

    /**
     * @var Processor Processor
     */
    protected $processor;

    public function __construct(array $configDirs = [], array $loaders = []) {
        $this->fileLocator = new FileLocator(array_merge(
            $configDirs,
            [__DIR__.'/Resources']
        ));

        $this->resolver = new LoaderResolver(array_merge(
            $loaders,
            [new YamlConfigurationLoader($this->fileLocator)]
        ));
        $this->loader = new DelegatingLoader($this->resolver);

        $this->processor = new Processor();
    }

    /**
     * Loads config file by name
     *
     * @param string                 $filename      Filename
     * @param ConfigurationInterface $configuration Configuration
     * @param string|null            $currentPath   Current path
     *
     * @return mixed Processed file
     */
    public function loadFile(string $filename, ConfigurationInterface $configuration, $currentPath = null) {
        $config = $this->loader->load(
            $this->fileLocator->locate($filename, $currentPath, true)
        );

        $config = $this->processor->processConfiguration(
            $configuration,
            [$config]
        );

        return $config;
    }

    /**
     * Loads config files by name while function returns true
     *
     * @param string                 $filename      Filename
     * @param ConfigurationInterface $configuration Configuration
     * @param callable               $func          Function
     * @param string|null            $currentPath   Current path
     *
     * @return mixed Processed file
     */
    public function loadFileWhile(string $filename, ConfigurationInterface $configuration, callable $func, $currentPath = null) {
        $files = $this->fileLocator->locate($filename, $currentPath, false);
        $loader = $this->resolver->resolve($files[0]);

        $configs = [];
        $processedConfig = [];
        foreach ($files as $file) {
            $config = $loader->load($file);

            array_unshift($configs, $config);

            try {
                $processedConfig = $this->processor->processConfiguration(
                    $configuration,
                    $configs
                );

                if (!$func($file, $processedConfig, $configs)) {
                    break;
                }
            } catch (ConfigException $e) {
                continue;
            }
        }

        return $processedConfig;
    }
}
