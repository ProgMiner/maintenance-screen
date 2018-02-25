<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()->
    files()->
    name('*.php')->
    exclude('Tests')->
    exclude('Resources')->
    in($dir = 'lib');

return new Sami($iterator, [
    'title'             => 'Maintenance screen API',

    'build_dir'         => __DIR__.'/docs',
    'cache_dir'         => __DIR__.'/sami-cache',

    'remote_repository' => new GitHubRemoteRepository('progminer/maintenance-screen', dirname($dir))
]);
