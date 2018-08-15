# maintenance-screen

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Code Coverage][ico-coverage]][link-coverage]
[![Scrutinizer Code Quality][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]

The "Maintenance mode" screen library

## Install

Via Composer

``` bash
composer require progminer/maintenance-screen
```

For using some included classes you also need to install more requrements:

- For `MaintenanceScreen\FileLoader\YamlFileLoader` - [Symfony Yaml](http://symfony.com/doc/current/components/yaml):
```bash
composer require symfony/yaml ^4.0
```
- For `ProgMinerUtils\TemplateRenderer\TwigTemplateRenderer` - [Twig](https://twig.symfony.com/):
```bash
composer require twig/twig ^2.4
```

## Usage

An instance of `MaintenanceScreen\MaintenanceScreen` consists of configurations array,
`MaintenanceScreen\TranslatorProvider\TranslatorProviderInterface` instance
and `ProgMinerUtils\TemplateRenderer\TemplateRendererInterface` instance.

This example step by step illustrates how works with the `MaintenanceScreen\MaintenanceScreen`.

### Example

In first order you have to write uses, include a `vendor/autoload.php` (ommited), etc.
Also you could make configuration array for `MaintenanceScreen\MaintenanceScreen`.

```php
use MaintenanceScreen\ConfigurationLoader;
use MaintenanceScreen\MaintenanceScreen;

use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

use ProgMinerUtils\TemplateRenderer\CallableTemplateRenderer;

$config = [
    'template_name'    => 'Default', // template name, not required
    'default_language' => 'en',      // uses if Accept-Language is not provided, not required
    'charset'          => 'utf-8'    // not required, charset for Response and TemplateRenderer
];
```

Here you have to make `MaintenanceScreen\TranslatorProvider\TranslatorProviderInterface` instance
and you have two included methods:
- Use translations from array (`MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider` class)
- Use translations from config files (`MaintenanceScreen\TranslatorProvider\FilesystemTranslatorProvider` class)

A simple example for first method here:
```php
$translatorsProvider = new ArrayTranslatorProvider([
    'en' => ['title' => 'Site in maintenance mode', 'text' => 'Site in maintenance mode'],
    'ru' => ['title' => 'Сайт в режиме техобслуживания', 'text' => 'Сайт в режиме техобслуживания']
]);
```

Also you can create class that implements `MaintenanceScreen\TranslatorProvider\ITranslatorProvider`.

Now you have to make a `ProgMinerUtils\TemplateRenderer\TemplateRendererInterface` instance,
for example, `ProgMinerUtils\TemplateRenderer\CallableTemplateRenderer`:
```php
$templateRenderer = new CallableTemplateRenderer([
    'Default' => function($vars) { ?>

<html lang="<?=$vars['lang']?>">
    <head><title><?=$vars['title']?></title></head>
    <body><h1><center><?=$vars['text']?></center></h1></body>
</html>

    <?php }
]);
```

And, finally, `MaintenanceScreen\MaintenanceScreen` instance:
```php
$maintenanceScreen = new MaintenanceScreen($config, $translatorProvider, $templateRenderer);
```

When you have an instance of `MaintenanceScreen\MaintenanceScreen`
you can render and/or send rendered `Symfony\Component\HttpFoundation\Response`:

- Rendering:
```php
$response = $maintenanceScreen->render();
```
- Sending:
```php
$maintenanceScreen->send();
```

Both methods have not required argument `$request` - instance of class `Symfony\Component\HttpFoundation\Request`.
If it is not provided this methods calls a `Symfony\Component\HttpFoundation\Request::createFromGlobals` method for getting current request.

## Todo

- Add more file loaders

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email eridan200@mail.ru instead of using the issue tracker.

## Credits

- [Eridan Domoratskiy][link-author]
- [All Contributors][link-contributors]

## API Documentation

This projects API documentation is built using [Sami](https://github.com/FriendsOfPHP/Sami)
and available at https://progminer.github.io/maintenance-screen/master/.

### Build

In order to build the documentation first get Sami as a phar file:
```bash
# curl -O http://get.sensiolabs.org/sami.phar
composer install-sami
```

Next build the documentation:
```bash
# php sami.phar update sami-config.php
composer regen-docs
```

The API Documentation will be generated into the [`docs`](docs/) folder.
If you would like to preview it locally you can easily do so
with the built-in PHP server:
```bash
php -S 127.0.0.1:3000 -t docs
```

Then visit http://localhost:3000/master/ to view.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/progminer/maintenance-screen.svg?style=flat
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat
[ico-travis]: https://travis-ci.org/ProgMiner/maintenance-screen.svg
[ico-coverage]: https://scrutinizer-ci.com/g/ProgMiner/maintenance-screen/badges/coverage.png
[ico-scrutinizer]: https://scrutinizer-ci.com/g/ProgMiner/maintenance-screen/badges/quality-score.png
[ico-downloads]: https://img.shields.io/packagist/dt/progminer/maintenance-screen.svg?style=flat

[link-packagist]: https://packagist.org/packages/progminer/maintenance-screen
[link-travis]: https://travis-ci.org/ProgMiner/maintenance-screen
[link-coverage]: https://scrutinizer-ci.com/g/ProgMiner/maintenance-screen/
[link-scrutinizer]: https://scrutinizer-ci.com/g/ProgMiner/maintenance-screen/
[link-downloads]: https://packagist.org/packages/progminer/maintenance-screen
[link-author]: https://github.com/ProgMiner
[link-contributors]: ../../contributors
