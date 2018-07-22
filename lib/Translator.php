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

use Symfony\Component\Config\Definition\Processor;

use MaintenanceScreen\Configurations\TranslatorConfiguration;

/**
 * Translates to some language
 *
 * @author Eridan Domoratskiy
 */
class Translator {

    /**
     * @var string[] Translations (Key => Translation)
     */
    protected $translations = [];

    /**
     * @var string Language name
     */
    protected $language;

    /**
     * @param string[] $translations Translations (Key => Translation)
     * @param string   $language     Language name
     */
    public function __construct(array $translations, string $language) {
        foreach ($translations as $key => $value) {
            if (is_string($value)) {
                $this->translations[$key] = $value;
            } else {
                throw new \InvalidArgumentException('$translations must have string[] type');
            }
        }

        $this->language = $language;
    }

    /**
     * Returns language name
     *
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

    /**
     * Returns all translations
     *
     * @return string[] Translations (Key => Translation)
     */
    public function getTranslations(): array {
        return $this->translations;
    }

    /**
     * Checks translation for key exists
     *
     * @param string $key Key
     *
     * @return bool
     */
    public function supports(string $key): bool {
        return isset($this->translations[$key]);
    }

    /**
     * Translates key
     *
     * @param string $key Key
     *
     * @return string Translation or key if is not exists
     */
    public function translate(string $key) {
        if (!$this->supports($key)) {
            return $key;
        }

        return $this->translations[$key];
    }

    /**
     * Makes Translator instance from config
     *
     * @param array  $config   Configuration array
     * @param string $language Language name
     *
     * @return static Made instance
     */
    public static function fromConfig(array $config, string $language): Translator {
        $translations = (new Processor())->
            processConfiguration(new TranslatorConfiguration(), [$config]);

        return new static($translations, $language);
    }
}
