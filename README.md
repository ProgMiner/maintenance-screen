# Maintenance Screen

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1124b9270e0145fd9b61ff1d19a822ac)](https://www.codacy.com/app/ProgMiner/maintenance-screen?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ProgMiner/maintenance-screen&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/445ff68081083b77ff4b/maintainability)](https://codeclimate.com/github/ProgMiner/maintenance-screen/maintainability)

The "Maintenance mode" screen library

- [Installation](#installation)
- [Usage](#usage)
  - [Example](#example)
- [Documentation](#documentation)
- [Todo](#todo)

### Installation

```bash
composer require progminer/maintenance-screen
```

### Usage

You can use this library for full or particional site closing.

- In first case we recommended you to use the [`maintenance-screen-project`](https://packagist.org/packages/progminer/maintenance-screen-project).
It is a base application based on this library.
If you needs to making you own application based on this library, please use sources from the above mentioned project.

- In second case you need to create an instance of [`MaintenanceScreen\MaintenanceScreen`](lib/MaintenanceScreen.php) using constructor (regular method)
or [`MaintenanceScreen\MaintenanceScreen::fromConfigFile`](lib/MaintenanceScreen.php#L136) (if you have a special configuration file).

Here is a regular second case method example:

#### Example
```php
use MaintenanceScreen\MaintenanceScreen;
use MaintenanceScreen\ConfigurationLoader;

use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

$config = [
    'template_name'    => 'Default', // template name, not required
    'default_language' => 'en',      // uses if Accept-Language is not provided, not required
    'charset'          => 'utf-8'    // not required
];
```

Here you have to make [`MaintenanceScreen\TranslatorProvider\TranslatorProviderInterface`](lib/TranslatorProvider/TranslatorProviderInterface.php) instance
and you have two included methods:
- Use translations from array ([`MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider`](lib/TranslatorProvider/ArrayTranslatorProvider.php) class)
- Use translations from config files ([`MaintenanceScreen\TranslatorProvider\FilesystemTranslatorProvider`](lib/TranslatorProvider/FilesystemTranslatorProvider.php) class)

A simple example for first method here:
```php
$translatorsProvider = new ArrayTranslatorProvider([
    'en' => ['title' => 'Site in maintenance mode', 'text' => 'Site in maintenance mode'],
    'ru' => ['title' => 'Сайт в режиме техобслуживания', 'text' => 'Сайт в режиме техобслуживания']
]);
```

Now you have to make a [`MaintenanceScreen\TemplateRenderer\TemplateRendererInterface`](lib/TemplateRenderer/TemplateRendererInterface.php) instance,
for example, [`MaintenanceScreen\TemplateRenderer\CallableTemplateRenderer`](lib/TemplateRenderer/CallableTemplateRenderer.php):
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

And, finally, [`MaintenanceScreen\MaintenanceScreen`](lib/MaintenanceScreen.php) instance:
```php
$maintenanceScreen = new MaintenanceScreen($config, $translatorProvider, $templateRenderer);
```

When you have an instance of [`MaintenanceScreen\MaintenanceScreen`](lib/MaintenanceScreen.php)
you can render and/or send rendered `\Symfony\Component\HttpFoundation\Response`:

- Rendering:
```php
$response = $maintenanceScreen->render();
```
- Sending:
```php
$maintenanceScreen->send();
```

Both methods have not required argument `$request` - instance of class `\Symfony\Component\HttpFoundation\Request`.
If it is not provided methods calls a `\Symfony\Component\HttpFoundation\Request::createFromGlobals` method for getting current request.

### Documentation

Documentation is unavailable now except code commentaries.

### Todo

- Add more translations
- Add more file loaders
