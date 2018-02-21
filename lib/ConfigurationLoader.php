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
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Processor;

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
     * @var DelegatingLoader Delegating loader
     */
    protected $delegatingLoader;

    /**
     * @var Processor Processor
     */
    protected $processor;

    public function __construct(array $configDirs = [], array $loaders = []) {
        $this->fileLocator = new FileLocator(array_merge(
            $configDirs,
            [__DIR__.'/Resources']
        ));

        $loaderResolver = new LoaderResolver(array_merge(
            $loaders,
            [new YamlConfigurationLoader($this->fileLocator)]
        ));
        $this->delegatingLoader = new DelegatingLoader($loaderResolver);

        $this->processor = new Processor();
    }

    public function loadFile(string $filename, ConfigurationInterface $configuration) {
        $config = $this->delegatingLoader->load(
            $this->fileLocator->locate($filename)
        );

        $config = $this->processor->processConfiguration(
                $configuration,
                [$config]
        );

        return $config;
    }
}
