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

use Symfony\Component\HttpFoundation\Request;

use MaintenanceScreen\MaintenanceScreen;
use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

use ProgMinerUtils\TemplateRenderer\CallableTemplateRenderer;

class MaintenanceScreenTest extends TestCase {

    public function testEmptyInstanceCanBeCreatedButCannotBeRendered() {
        $this->assertInstanceOf(
            MaintenanceScreen::class,
            $maintenanceScreen = new MaintenanceScreen([], new ArrayTranslatorProvider([]), new CallableTemplateRenderer([]))
        );

        $this->expectException(\Throwable::class);
        $maintenanceScreen->render();
    }

    public function testCanBeRendered() {
        $maintenanceScreen = $this->constructMaintenanceScreen();

        $this->assertTrue(
            strpos(trim($maintenanceScreen->render()->getContent()), 'Test') === 0
        );
    }

    public function testCanBeRenderedWithCustomRequest() {
        $maintenanceScreen = $this->constructMaintenanceScreen();

        $this->assertTrue(
            strpos(trim($maintenanceScreen->render(new Request())->getContent()), 'Test') === 0
        );
    }

    public function testCanBeSended() {
        $maintenanceScreen = $this->constructMaintenanceScreen();

        ob_start();

        $maintenanceScreen->send();

        $sended = ob_get_contents();
        ob_end_clean();

        $this->assertTrue(
            strpos(trim($sended), 'Test') === 0
        );
    }

    protected function constructMaintenanceScreen(): MaintenanceScreen {
        $config = [
            'default_language' => 'Language_'.rand(),
            'template_name'    => 'Template_'.rand()
        ];

        return new MaintenanceScreen($config, ArrayTranslatorProvider::fromArrays([
            $config['default_language'] => ['content' => 'Test']
        ]), new CallableTemplateRenderer([
            $config['template_name'] => function($vars) { echo $vars['content']; }
        ]));
    }
}
