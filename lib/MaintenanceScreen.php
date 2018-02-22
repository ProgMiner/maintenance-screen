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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use MaintenanceScreen\Configurations\MainConfiguration;

/**
 * Main class
 *
 * @author ProgMiner
 */
class MaintenanceScreen {

    /**
     * @var array Configuration
     */
    protected $config;

    /**
     * @var TranslationsProvider Translations
     */
    protected $translations;

    /**
     * @var Twig_Environment Twig
     */
    protected $twig;

    public function __construct(array $config, TranslationsProvider $translations, \Twig_Environment $twig) {
        $this->config = $config;
        $this->translations = $translations;
        $this->twig = $twig;
    }

    public function render($language = null): Response {
        if (is_null($language)) {
            $language = LanguageProvider::makeFrom();
        }

        if (!is_a($language, LanguageProvider::class, false)) {
            throw new \InvalidArgumentException('Language must be a LanguageProvider');
        }

        $response = new Response();

        $text = $this->translations->translate($language, $resultLang);

        $response->setContent($this->twig->render($this->config['template_name'], [
            'language' => $resultLang,
            'text'     => $text
        ]));
        $response->headers->set('Content-Language', $resultLang);

        return $response;
    }

    public function send($language = null) {
        $this->
        render($language)->
        prepare(Request::createFromGlobals())->
        send();
    }

    /**
     * Makes MaintenanceScreen instance from config file
     *
     * @param string              $configFile          Config file name
     * @param ConfigurationLoader $configurationLoader Configuration loader
     * @param Twig_Environment    $twig                Twig
     *
     * @return static Maked instance
     */
    public static function makeFrom(
        string $configFile,
        ConfigurationLoader $configurationLoader,
        $twig = null
    ) {
        if (is_null($twig)) {
            $twig = new \Twig_Environment(
                new \Twig_Loader_Filesystem([__DIR__.'/Resources/templates'], __DIR__),
                ['cache' => __DIR__.'/Resources/twig_cache']
            );
        }

        if (!is_a($twig, \Twig_Environment::class, true)) {
            throw new \InvalidArgumentException('Twig must be a Twig_Environment');
        }

        return new static(
            $configurationLoader->loadFile($configFile, new MainConfiguration()),
            TranslationsProvider::fromConfigFile('translations.yml', $configurationLoader),
            $twig
        );
    }
}
