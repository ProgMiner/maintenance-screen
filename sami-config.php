<?php

use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Sami\Sami;

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()->
    files()->
    name('*.php')->
    in(realpath(__DIR__.'/lib'));

// Sami doesn't seem to write out the docs folder for v1 and v2
$versions = GitVersionCollection::create(realpath(__DIR__))->
    // addFromTags('v1.*')->
    // addFromTags('v2.*')->
    addFromTags('v3.*')->
    addFromTags('v4.*')->
    add('master', 'master branch');

return new Sami($iterator, [
    'title'    => 'Maintenance screen API',
    'versions' => $versions,

    'build_dir' => __DIR__.'/docs/%version%',
    'cache_dir' => __DIR__.'/sami-cache/%version%',

    'insert_todos'      => true,
    'remote_repository' => new GitHubRemoteRepository('ProgMiner/maintenance-screen', realpath(__DIR__))
]);
