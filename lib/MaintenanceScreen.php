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
    protected $config, $translations;

    public function __construct(array $config, array $translations) {
        $this->config = $config;
        $this->translations = $translations;
    }

    /**
     * Makes MaintenanceScreen instance from config file
     *
     * @param string $configFile Config file name
     * @param array  $configDirs Directories to search config file
     * @param array  $loaders    Extra loaders for config file
     *
     * @return static Maked instance
     */
    public static function makeFrom(string $configFile, array $configDirs = [], array $loaders = []) {
        $configurationLoader = new ConfigurationLoader(
            $configDirs,
            $loaders
        );

        $translations = $configurationLoader->loadFileWhile(
            'translations.yml',
            new TranslationsConfiguration(),
            function($file, $config) { return !$config['last']; }
        );

        unset($translations['last']);
        foreach ($translations['translations'] as $key => $node) {
            unset($translations['translations'][$key]);
            $translations['translations'][$key] = $node['text'];
        }

        return new static(
            $configurationLoader->loadFile($configFile, new MainConfiguration()),
            $translations
        );
    }
}
