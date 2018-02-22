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
 * Accept-Language parser
 *
 * @author ProgMiner
 */
class LanguageProvider {

    /**
     * @var array Languages
     */
    protected $languages = [];

    public function __construct(array $languages) {
        foreach ($languages as $lang) {
            $this->languages[] = $lang;

            if (false !== strpos($lang, '-')) {
                $this->languages[] = explode('-', $lang, 2)[0];
            }
        }

        $this->languages = array_unique($this->languages);
    }

    public function getLanguages(): array {
        return $this->languages;
    }

    /**
     * Returns is language is supported
     *
     * @param string $lang Language name
     *
     * @return bool Is language supported
     */
    public function isSupported(string $lang, bool $strict = false): bool {
        if (in_array($lang, $this->languages, true)) {
            return true;
        }

        if ($strict || false === strpos($lang, '-')) {
            return false;
        }

        return in_array(explode('-', $lang, 2)[0], $this->languages, true);
    }

    /**
     * Finds and returns supported language from list
     *
     * @param array $langs List of language names
     *
     * @return string|null Searched language or null
     */
    public function searchSupported(array $langs) {
        foreach ($langs as $lang) {
            if ($this->isSupported($lang)) {
                return $lang;
            }
        }

        return null;
    }

    /**
     * Makes LanguageProvider instance from Accept-Language header
     *
     * @param string|null Accept-Language content
     *
     * @return static
     *
     * @link https://m.habrahabr.ru/post/159129/
     */
    public static function makeFrom($acceptLanguage = null) {
        if (is_null($acceptLanguage)) {
            try {
                return static::makeFromGlobal();
            } catch (\Throwable $e) {
                return new static([]);
            }
        }

        $acceptLanguage = strtolower((string) $acceptLanguage);

        if (preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $acceptLanguage, $matches)) {
            $priorities = array_combine($matches[1], $matches[2]);

            foreach ($priorities as $n => $v) {
                $priorities[$n] = $v ? $v : 1;
            }

            arsort($priorities, SORT_NUMERIC);

            return new static(array_keys($priorities));
        }

        throw new \UnexpectedValueException('Accept language is not contains Accept-Language header');
    }

    /**
     * Makes LanguageProvider instance from Accept-Language header
     * if it is provided in global {@see $_SERVER}
     *
     * @return static
     */
    public static function makeFromGlobal() {
        if (
            !isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ||
            is_null($_SERVER['HTTP_ACCEPT_LANGUAGE'])
        ) {
            throw new \RuntimeException('Accept-Language header is not set');
        }

        return static::makeFrom($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    }
}
