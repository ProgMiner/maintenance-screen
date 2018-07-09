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

use MaintenanceScreen\Translator;

class TranslatorTest extends TestCase {

    public function testCanHaveNotTranslations() {
        $this->assertInstanceOf(
            Translator::class,
            new Translator([], '')
        );
    }

    public function testCanReturnLanguageName() {
        $languageName = 'Language_'.rand();

        $translator = new Translator([], $languageName);
        $this->assertEquals(
            $translator->getLanguage(),
            $languageName
        );
    }

    public function testCanReturnTranslations() {
        $translations = ['Kay_'.rand() => 'Translation_'.rand()];

        $translator = new Translator($translations, '');
        $this->assertEquals(
            $translator->getTranslations(),
            $translations
        );
    }

    public function testCanCheckSupporting() {
        $key = 'Key_'.rand();

        $translator = new Translator([$key => ''], '');
        $this->assertTrue($translator->supports($key));
    }

    public function testCanTranslate() {
        $translation = 'Translation_'.rand();
        $key = 'Key_'.rand();

        $translator = new Translator([$key => $translation], '');
        $this->assertEquals(
            $translator->translate($key),
            $translation
        );
    }

    public function testCannotTranslateUnknownKey() {
        $key = 'Key_'.rand();

        $translator = new Translator([], '');
        $this->assertEquals(
            $translator->translate($key),
            $key
        );
    }

    public function testCanBeCreatedFromConfig() {
        $translation = 'Translation_'.rand();
        $key = 'Key_'.rand();

        $lang = 'Lang_'.rand();

        $this->assertInstanceOf(
            Translator::class,
            $translator = Translator::fromConfig([
                $key => ['text' => $translation]
            ], $lang)
        );

        $this->assertEquals(
            $translator->translate($key),
            $translation
        );

        $this->assertEquals(
            $translator->getLanguage(),
            $lang
        );
    }
}
