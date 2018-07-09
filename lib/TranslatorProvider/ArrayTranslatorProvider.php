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
 * Array-based Translator instances provider
 *
 * @author ProgMiner
 */
class ArrayTranslatorProvider extends AbstractTranslatorProvider {

    /**
     * @var Translator[] Array of languages and their Translators (Language code => Translator)
     */
    protected $translators = [];

    /**
     * @param Translator[] $langs Array of Translators
     */
    public function __construct(array $langs) {
        foreach ($langs as $translator) {
            if (is_a($translator, Translator::class, false)) {
                $this->translators[$translator->getLanguage()] = $translator;
            } else {
                throw new \InvalidArgumentException('$langs must have Translator[] type');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function _getTranslator(string $lang): Translator {
        if (!isset($this->translators[$lang])) {
            throw new \UnexpectedValueException("Translator for language \"{$lang}\" is not exists");
        }

        return $this->translators[$lang];
    }

    /**
     * Makes {@see ArrayTranslatorProvider}
     * from array of arrays with strings
     *
     * @param string[][] $arrays Array of arrays with translations (Language code => (Key => Translation))
     *
     * @return ArrayTranslatorProvider
     */
    public static function fromArrays(array $arrays): ArrayTranslatorProvider {
        $ret = new static([]);

        foreach ($arrays as $lang => $translations) {
            if (is_array($translations)) {
                $ret->translators[$lang] = new Translator($translations, $lang);
            } else {
                throw new \InvalidArgumentException('$arrays must have string[][] type');
            }
        }

        return $ret;
    }
}
