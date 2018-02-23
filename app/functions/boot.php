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

namespace MaintenanceScreen\Application;

use MaintenanceScreen\MaintenanceScreen;
use MaintenanceScreen\ConfigurationLoader;

/**
 * Boot function
 *
 * @author ProgMiner
 */
function boot() {
    if (!defined('__ROOT__')) {
        die('__ROOT__ is not defined');
    }

    try {
        $maintenanceScreen = MaintenanceScreen::makeFrom(
            'config.yml',
            new ConfigurationLoader([__ROOT__.'app/config']),
            new ConfigurationLoader([
                __ROOT__.'app/translations',
                __ROOT__.'lib/Resources/translations'
            ]),
            new \Twig_Environment(
                new \Twig_Loader_Filesystem([
                    __ROOT__.'app/templates',
                    __ROOT__.'lib/Resources/templates'
                ], __ROOT__),
                ['cache' => __ROOT__.'app/twig-cache']
            )
        );

        $maintenanceScreen->send();
    } catch (Throwable $e) {
        throw new \RuntimeException('Invalid config file', 0, $e);
    }
}
