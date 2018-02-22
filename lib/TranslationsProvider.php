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

use MaintenanceScreen\Configurations\TranslationsConfiguration;

/**
 * Provides translations
 *
 * @author ProgMiner
 */
class TranslationsProvider {

    /**
     * @var string Default translation
     */
    protected $default;

    /**
     * @var string Default language
     */
    protected $defaultLanguage;

    /**
     * @var array Translations
     */
    protected $translations;

    public function __construct(string $default, string $defaultLanguage, array $translations) {
        $this->default = $default;
        $this->defaultLanguage = $defaultLanguage;

        $translations[$defaultLanguage] = $default;
        $this->translations = $translations;
    }

    public function supports(LanguageProvider $language): bool {
        return !is_null($language->searchSupported(
            array_keys($this->translations)
        ));
    }

    public function translate(LanguageProvider $language, & $resultedLanguage = null): string {
        if (!$this->supports($language)) {
            $resultedLanguage = $this->defaultLanguage;

            return $this->default;
        }

        $resultedLanguage = $language->searchSupported(
            array_keys($this->translations)
        );

        return $this->translations[$resultedLanguage];
    }

    /**
     * Makes TranslationsProvider instance from config array
     *
     * @param array $config Config array
     *
     * @return static Maked instance
     */
    public static function fromConfigArray(array $config) {
        return new static(
            $config['default']['text'],
            $config['default']['language'],
            $config['translations']
        );
    }

    /**
     * Makes TranslationsProvider instance from config file
     *
     * @param string              $configFile          Config file name
     * @param ConfigurationLoader $configurationLoader Configuration loader
     *
     * @return static Maked instance
     */
    public static function fromConfigFile(string $configFile, ConfigurationLoader $configurationLoader) {
        $translations = $configurationLoader->loadFileWhile(
            $configFile,
            new TranslationsConfiguration(),
            function($file, $config) { return !$config['last']; }
        );

        unset($translations['last']);
        foreach ($translations['translations'] as $key => $node) {
            unset($translations['translations'][$key]);
            $translations['translations'][strtolower($key)] = $node['text'];
        }

        return static::fromConfigArray($translations);
    }
}
