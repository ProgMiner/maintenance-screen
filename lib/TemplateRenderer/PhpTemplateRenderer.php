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

namespace MaintenanceScreen/TemplateRenderer;

use Symfony\Component\Config\FileLocator;

/**
 * Template renderer for PHP templates
 *
 * @author ProgMiner
 */
class PhpTemplateRenderer implements TemplateRendererInterface {

    /**
     * @var FileLocator File locator for template files
     */
    protected $fileLocator;

    /**
     * @param FileLocator $fileLocator File locator for template files
     */
    public function __construct(FileLocator $fileLocator) {
        $this->fileLocator = $fileLocator;
    }

    /**
     * {@inheritdoc}
     */
    public function render(string $template, array $variables): string {
        $file = $this->fileLocator->locate($template, null, true);

        ob_start();
        (function() use($file, $variables) {
            extract($variables);

            require $file;
        })();
        $ret = ob_get_contents();
        ob_end_clean();

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(string $template): bool {
        $ext = pathinfo($template, PATHINFO_EXTENSION);

        return (
            'php' === $ext ||
            'phtml' === $ext
        );
    }
}
