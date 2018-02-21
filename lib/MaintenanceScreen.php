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
use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;

use MaintenanceScreen\Configurations\MainConfiguration;
use MaintenanceScreen\Configurations\TranslationsConfiguration;

/**
 * Main class
 *
 * @author ProgMiner
 */
class MaintenanceScreen {

    /**
     * @var array $config       Configuration
     * @var array $translations Translations
     */
    protected $config = null, $translations = null;

    /**
     * @var ConfigurationLoader Configuration loader
     */
    protected $configurationLoader;

    public function __construct(string $configFile, array $additionalConfigDirs = [], array $additionalLoaders = []) {
        $this->configurationLoader = new ConfigurationLoader(
            $additionalConfigDirs,
            $additionalLoaders
        );

        header('Content-Type: text/plain');
        var_dump($this->getConfig($configFile));
    }

    public function getConfig(string $configFile = 'config.yml'): array {
        if (!is_null($this->config)) {
            return $this->config;
        }

        $this->config = $this->configurationLoader->loadFile(
            $configFile,
            new MainConfiguration()
        );

        return $this->config;
    }

    public function getTranslations(): array {
        if (!is_null($this->translations)) {
            return $this->translations;
        }

        $this->config = $this->configurationLoader->loadFile(
            'translations.yml',
            new TranslationsConfiguration()
        );

        return $this->config;
    }
}
