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

use MaintenanceScreen\Translator;

/**
 * Abstract provider of Translator instances
 *
 * @author ProgMiner
 */
abstract class AbstractTranslatorProvider implements ITranslatorProvider {

    /**
     * Makes Translator for language
     *
     * @param string $lang Language name
     *
     * @return Translator
     */
    protected abstract function _getTranslator(string $lang): Translator;

    /**
     * {@inheritdoc}
     */
    public function getTranslator(string $lang): Translator {
        $lang = str_replace('-', '_', $lang);
        $args = func_get_args();

        $exception = null;
        try {
            return call_user_func_array([$this, '_getTranslator'], $args);
        } catch (\Throwable $e) {
            $exception = $e;
        }

        // If $lang is includes country code, try call self only for language code
        if (false !== ($pos = strpos($lang, '_'))) {
            try {
                array_shift($args);
                array_unshift($args, substr($lang, 0, $pos));

                return call_user_func_array([$this, 'getTranslator'], $args);
            } catch (\Throwable $e) {
                // Uninformative exception
            }
        }

        throw $exception;
    }

    /**
     * {@inheritdoc}
     */
    public function getPreferredTranslator(array $langs, string $defaultLang = null): Translator {
        if (!is_null($defaultLang)) {
            $langs[] = $defaultLang;
        }

        $args = func_get_args();
        array_shift($args);

        foreach ($langs as $lang) {
            try {
                array_shift($args);
                array_unshift($args, $lang);

                return call_user_func_array([$this, 'getTranslator'], $args);
            } catch (\Throwable $e) {
                // A lot of uninformative exceptions
            }
        }

        throw new \RuntimeException('No one language exists');
    }
}
