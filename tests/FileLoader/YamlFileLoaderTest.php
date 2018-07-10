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

use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;
use Symfony\Component\Config\Exception\FileLoaderLoadException;

use Symfony\Component\Config\FileLocator;

use MaintenanceScreen\FileLoader\YamlFileLoader;

class YamlFileLoaderTest extends TestCase {

    public function testLoadWorks() {
        $loader = new YamlFileLoader(new FileLocator(__DIR__.'/../Resources/FileLoader/YamlFileLoader/'));

        $this->assertNull($loader->load('Test.yaml'));
        $this->assertNull($loader->load('Test.yml'));

        $this->assertNull($loader->load('Test.txt'));
        $this->assertNull($loader->load('Test'));
    }

    public function testSupportsWorks() {
        $loader = new YamlFileLoader(new FileLocator(__DIR__.'/../Resources/FileLoader/YamlFileLoader/'));

        $this->assertFalse($loader->supports((object) []));

        $this->assertTrue($loader->supports('Test.yaml'));
        $this->assertTrue($loader->supports('Test.yml'));

        $this->assertFalse($loader->supports('Test.txt'));
        $this->assertFalse($loader->supports('Test'));

        $this->assertTrue($loader->supports(rand().'.yaml'));
        $this->assertTrue($loader->supports(rand().'.yml'));
    }
}
