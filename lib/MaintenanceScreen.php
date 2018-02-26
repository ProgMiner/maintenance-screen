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

use MaintenanceScreen\TranslatorProvider\TranslatorProviderInterface;
use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

use MaintenanceScreen\TemplateRenderer\TemplateRendererInterface;
use MaintenanceScreen\TemplateRenderer\CallableTemplateRenderer;

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
     * @var TemplateRendererInterface Template renderer
     */
    protected $templateRenderer;

    /**
     * @param array                       $config             Configurations array
     * @param TranslatorProviderInterface $translatorProvider Translator provider
     * @param TemplateRendererInterface   $templateRenderer   Template renderer
     */
    public function __construct(array $config, TranslatorProviderInterface $translatorProvider, TemplateRendererInterface $templateRenderer) {
        $this->config = (new Processor())->processConfiguration(
            new MainConfiguration(),
            [$config]
        );

        $this->translatorProvider = $translatorProvider;
        $this->templateRenderer = $templateRenderer;
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

        $response->setContent($this->templateRenderer->render(
            $this->config['template_name'],
            array_merge($translator->getTranslations(), [
                'lang' => $translator->getLanguage(),
                'charset' => $this->config['charset']
            ])
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
     * @param string                           $configFile         Config file name
     * @param ConfigurationLoader              $configLoader       Config files loader
     * @param TranslatorProviderInterface|null $translatorProvider Translator provider
     * @param TemplateRendererInterface|null   $templateRenderer   Template renderer
     *
     * @return static Maked instance
     */
    public static function makeFromConfigFile(
        string $configFile,
        ConfigurationLoader $configLoader,
        $translatorProvider = null,
        $templateRenderer = null
    ) {
        if (is_null($translatorProvider)) {
            $translatorProvider = new ArrayTranslatorProvider(['en' => [
                'title' => 'Site in maintenance mode',
                'text'  => 'Site in maintenance mode'
            ]]);
        }

        if (!is_a($translatorProvider, TranslatorProviderInterface::class, true)) {
            throw new \InvalidArgumentException('Translator provider must be a '.TranslatorProviderInterface::class);
        }

        if (is_null($templateRenderer)) {
            $templateRenderer = new CallableTemplateRenderer([
                function($vars) { ?>
<!DOCTYPE html>
<html lang="<?=$vars['lang']?>">
    <head>
        <title><?=$vars['title']?></title>
        <meta charset="<?=$vars['charset']?>">
    </head>
    <body>
        <h1><center><?=$vars['text']?></center></h1>
    </body>
</html>
                <?php }
            ]);
        }

        if (!is_a($templateRenderer, TemplateRendererInterface::class, true)) {
            throw new \InvalidArgumentException('Template renderer must be a '.TemplateRendererInterface::class);
        }

        return new static(
            $configLoader->loadFile($configFile),
            $translatorProvider,
            $templateRenderer
        );
    }

    private static function checkRequest($request): Request {
        if (is_null($request)) {
            return Request::createFromGlobals();
        }

        if (!is_a($request, Request::class, true)) {
            throw new \InvalidArgumentException('Request must be a '.Request::class);
        }

        return $request;
    }
}
