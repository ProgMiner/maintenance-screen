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

use Symfony\Component\Config\Definition\Processor;

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
     * @var TranslatorProviderInterface Translator provider
     */
    protected $translatorProvider;

    /**
     * @var Twig_Environment Twig
     */
    protected $twig;

    /**
     * @param array              $config             Configurations array
     * @param TranslatorProviderInterface $translatorProvider Translator provider
     * @param \Twig_Environment  $twig               Twig environment instance
     */
    public function __construct(array $config, TranslatorProviderInterface $translatorProvider, \Twig_Environment $twig) {
        $this->config = (new Processor())->processConfiguration(
            new MainConfiguration(),
            [$config]
        );

        $this->translatorProvider = $translatorProvider;
        $this->twig = $twig;
    }

    /**
     * Renders maintenance screen for Request to Response
     *
     * If Request is not provided uses
     * created from globals instance
     *
     * @param Request $request Request for rendering
     *
     * @return Response Rendered maintenance screen
     */
    public function render($request = null): Response {
        $request = self::checkRequest($request);

        $translator = $this->translatorProvider->getPreferredTranslator(
            $request->getLanguages(),
            $this->config['default_language']
        );

        $response = new Response();

        $response->setContent($this->twig->render(
            $this->config['template_name'],
            array_merge($translator->getTranslations(), ['charset' => $this->config['charset']])
        )."\n<!-- Powered by progminer/maintenance-screen (https://packagist.org/packages/progminer/maintenance-screen) -->\n");
        $response->headers->set('Content-Language', $translator->translate('lang'));

        return $response;
    }

    /**
     * Renders and sends maintenance screen for Request
     *
     * If Request is not provided uses
     * created from globals instance
     *
     * @param Request $request Request for rendering
     */
    public function send($request = null) {
        $request = self::checkRequest($request);

        $this->
        render($request)->
        prepare($request)->
        send();
    }

    /**
     * Makes MaintenanceScreen instance from config file
     *
     * @param string              $configFile        Config file name
     * @param ConfigurationLoader $configLoader      Config files loader
     * @param ConfigurationLoader $translatorsLoader Translator config files loader
     * @param \Twig_Environment   $twig              Twig
     *
     * @return static Maked instance
     */
    public static function makeFromConfigFiles(
        string $configFile,
        ConfigurationLoader $configLoader,
        $translatorsLoader = null,
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

        if (is_null($translatorsLoader)) {
            $translatorsLoader = new ConfigurationLoader(
                [__DIR__.'/Resources/translations']
            );
        }

        if (!is_a($translatorsLoader, ConfigurationLoader::class, true)) {
            throw new \InvalidArgumentException('Translators loader must be a ConfigurationLoader');
        }

        return new static(
            $configLoader->loadFile($configFile),
            new FilesystemTranslatorProvider($translatorsLoader),
            $twig
        );
    }

    private static function checkRequest($request): Request {
        if (is_null($request)) {
            return Request::createFromGlobals();
        }

        if (!is_a($request, Request::class, true)) {
            throw new \InvalidArgumentException('Request must be a Request');
        }

        return $request;
    }
}
