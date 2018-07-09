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

use PHPUnit\Framework\TestCase;

use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

use MaintenanceScreen\Translator;

class ArrayTranslatorProviderTest extends TestCase {

    public function testCanHaveNotTranslators() {
        $this->assertInstanceOf(
            ArrayTranslatorProvider::class,
            new ArrayTranslatorProvider([])
        );
    }

    public function testCanHaveOnlyTranslators() {
        $this->assertInstanceOf(
            ArrayTranslatorProvider::class,
            new ArrayTranslatorProvider([
                new Translator([], '')
            ])
        );

        $this->expectException(\InvalidArgumentException::class);
        new ArrayTranslatorProvider(['']);
    }

    public function testCanProvideTranslator() {
        $language = 'Language_'.rand();

        $translator = new Translator(['Key_'.rand() => 'Translation_'.rand()], $language);
        $provider = new ArrayTranslatorProvider([$translator]);

        $this->assertEquals(
            $provider->getTranslator($language),
            $translator
        );
    }

    public function testCannotProvideTranslatorForUnknownLanguage() {
        $provider = new ArrayTranslatorProvider([]);

        $this->expectException(\UnexpectedValueException::class);
        $provider->getTranslator('Language_'.rand());
    }

    public function testCanBeCreatedFromArrays() {
        $language = 'Language_'.rand();

        $key = 'Key_'.rand();
        $translation = 'Translation_'.rand();

        $this->assertInstanceOf(
            ArrayTranslatorProvider::class,
            $provider = ArrayTranslatorProvider::fromArrays([
                $language => [$key => $translation]
            ])
        );

        $this->assertEquals(
            $provider->getTranslator($language)->translate($key),
            $translation
        );

        $this->expectException(\InvalidArgumentException::class);
        ArrayTranslatorProvider::fromArrays(['']);
    }
}
