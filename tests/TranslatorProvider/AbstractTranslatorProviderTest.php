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

use MaintenanceScreen\TranslatorProvider\AbstractTranslatorProvider;

use MaintenanceScreen\Translator;

class AbstractTranslatorProviderTest extends TestCase {

    /**
     * @testdox getTranslator replaces hyphens with underscores
     */
    public function testReplacesHyphensWithUnderscores() {
        $provider = new CustomTranslatorProvider1();

        $this->assertEquals(
            $provider->getTranslator('-')->getLanguage(),
            '_'
        );
    }

    /**
     * @testdox getTranslator passes all arguments to _getTranslator
     */
    public function testPassesAllArgumentsToTheInternalFunction() {
        $args = ['Language_'.rand(), rand(), rand()];

        $provider = new CustomTranslatorProvider1();
        $this->assertEquals(
            $provider->getTranslator(...$args)->getLanguage(),
            implode(', ', $args)
        );
    }

    /**
     * @testdox getTranslator tries to get Translator without country code with all arguments
     */
    public function testTriesToGetTranslatorWithoutCountryCodeWithAllArguments() {
        $language = (string) rand();

        $args1 = $args2 = [rand(), rand()];
        array_unshift($args1, $language.'_'.rand());
        array_unshift($args2, $language);

        $provider = new CustomTranslatorProvider2();
        $this->assertEquals(
            $provider->getTranslator(...$args1)->getLanguage(),
            implode(', ', $args2)
        );
    }

    /**
     * @testdox getTranslator throws exception of first attempt if both attempts threw exceptions
     */
    public function testThrowsExceptionOfFirstAttemptIfBothAttemptsThrewException() {
        $language = rand().'_'.rand();

        $exception = new \Exception('');
        try {
            $provider = new CustomTranslatorProvider3();
            $provider->getTranslator($language)->getLanguage();
        } catch (\Exception $e) {
            $exception = $e;
        }

        $this->assertEquals(
            $exception->getMessage(),
            $language
        );
    }

    /**
     * @testdox getPreferredTranslator can receive null as default language
     */
    public function testCanReceiveNullAsDefaultLanguage() {
        $provider = new CustomTranslatorProvider1();

        $this->assertEquals(
            $provider->getPreferredTranslator([''], null)->getLanguage(),
            ''
        );
    }

    /**
     * @testdox getPreferredTranslator throw exception for empty array
     */
    public function testThrowExceptionForEmptyArray() {
        $provider = new CustomTranslatorProvider1();

        $this->expectException(\Exception::class);
        $provider->getPreferredTranslator([]);
    }

    /**
     * @testdox getPreferredTranslator adds default language to languages array
     */
    public function testAddsDefaultLanguageToLanguagesArray() {
        $language = 'Language_'.rand();

        $provider = new CustomTranslatorProvider1();
        $this->assertEquals(
            $provider->getPreferredTranslator([], $language)->getLanguage(),
            $language
        );
    }

    /**
     * @testdox getPreferredTranslator adds default language at end of languages array
     */
    public function testAddsDefaultLanguageAtEndOfLanguagesArray() {
        $language = 'Language_'.rand();

        $provider = new CustomTranslatorProvider1();
        $this->assertEquals(
            $provider->getPreferredTranslator([$language], '')->getLanguage(),
            $language
        );
    }

    /**
     * @testdox getPreferredTranslator passes all arguments except required to getTranslator
     */
    public function testGetPreferredTranslatorPassesAllArgumentsToTheGetTranslatorFunction() {
        $language = 'Language_'.rand();

        $args1 = $args2 = [rand(), rand()];
        array_unshift($args1, [$language], null);
        array_unshift($args2, $language);

        $provider = new CustomTranslatorProvider1();
        $this->assertEquals(
            $provider->getPreferredTranslator(...$args1)->getLanguage(),
            implode(', ', $args2)
        );
    }

    /**
     * @testdox getPreferredTranslator throws an exception if no one of the provided language is not supported
     */
    public function testThrowsAnExceptionIfNoOneOfTheProvidedLanguageIsNotSupported() {
        $provider = new CustomTranslatorProvider3();

        $this->expectException(\Exception::class);
        $provider->getPreferredTranslator(['Language_'.rand(), 'Language_'.rand()]);
    }
}

class CustomTranslatorProvider1 extends AbstractTranslatorProvider {

    protected function _getTranslator(string $lang): Translator {
        return new Translator([], implode(', ', func_get_args()));
    }
}

class CustomTranslatorProvider2 extends AbstractTranslatorProvider {

    protected function _getTranslator(string $lang): Translator {
        if (strpos($lang, '_') !== false) {
            throw new \UnexpectedValueException('Country code is not supported');
        }

        return new Translator([], implode(', ', func_get_args())); 
    }
}

class CustomTranslatorProvider3 extends AbstractTranslatorProvider {

    protected function _getTranslator(string $lang): Translator {
        throw new \Exception($lang);
    }
}
