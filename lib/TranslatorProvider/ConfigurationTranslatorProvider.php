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

namespace MaintenanceScreen\TranslatorProvider;

use MaintenanceScreen\ConfigurationLoader;
use MaintenanceScreen\Translator;

/**
 * Provides Translator instances from configs
 *
 * @author ProgMiner
 */
class ConfigurationTranslatorProvider extends AbstractTranslatorProvider {

    /**
     * @var ConfigurationLoader Translator configs loader
     */
    protected $configLoader;

    /**
     * @param ConfigurationLoader $configLoader Translator configs loader
     */
    public function __construct(ConfigurationLoader $configLoader) {
        $this->configLoader = $configLoader;
    }

    /**
     * Makes Translator from config
     *
     * Loads config from {@see ConfigurationTranslatorProvider::$configLoader}
     * by language name with prefix and suffix.
     *
     * @param string $lang   Language name
     * @param string $suffix Suffix for config name (default is '.yml')
     * @param string $prefix Prefix for config name (default is '')
     *
     * @return Translator
     */
    protected function _getTranslator(string $lang, string $suffix = '.yml', string $prefix = ''): Translator {
        $name = $prefix.$lang.$suffix;

        return Translator::fromConfig($this->configLoader->load($name), $lang);
    }
}
