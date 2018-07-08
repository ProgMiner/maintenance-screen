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

use Symfony\Component\Config\Loader\Loader;

use MaintenanceScreen\FileLoader\YamlFileLoader;
use MaintenanceScreen\ConfigurationLoader;

class ConfigurationLoaderTest extends TestCase {

    public function testCanHaveNotLoaders() {
        $this->assertInstanceOf(ConfigurationLoader::class, new ConfigurationLoader([]));
    }

    /**
     * @expectedException \Throwable
     */
    public function testCanHaveOnlyLoaders() {
        new ConfigurationLoader([(object) []]);
    }

    public function testCanUseCustomFileLoaders() {
        $loader = new ConfigurationLoader([new CustomLoader1()]);

        $this->assertEquals($loader->load('ABCD'), 'ABCD');
    }

    /**
     * @expectedException \Symfony\Component\Config\Exception\FileLoaderLoadException
     */
    public function testThrowsExceptionIfCanNotLoadConfig() {
        $loader = new ConfigurationLoader([new CustomLoader2()]);

        $loader->load('ABCD');
    }
}

class CustomLoader1 extends Loader {

    public function load($resource, $type = null) { return $resource; }
    public function supports($resource, $type = null) { return true; }
}

class CustomLoader2 extends Loader {

    public function load($resource, $type = null) { throw new Exception($resource); }
    public function supports($resource, $type = null) { return false; }
}