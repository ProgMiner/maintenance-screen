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
composer require progminer/maintenance-screen maintenance-screen dev-config-splitting
```

### Usage

You can use this library for full or particional site closing.

- In first case we recommended you to use the [`maintenance-screen-project`](https://packagist.org/packages/progminer/maintenance-screen-project).
It is a base application based on this library.
If you needs to making you own application based on this library, please use sources from the above mentioned project.

- In second case you need to create an instance of [`MaintenanceScreen\MaintenanceScreen`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/MaintenanceScreen.html) using constructor (regular method)
or [`MaintenanceScreen\MaintenanceScreen::makeFrom`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/MaintenanceScreen#method_makeFrom.html) (if you have a special configuration file).

Here is a regular second case method example:

#### Example
```php
use MaintenanceScreen\MaintenanceScreen;
use MaintenanceScreen\ConfigurationLoader;

use MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider;

$config = [
    'template_name'    => 'Default', // template name
    'default_language' => 'en',      // uses if Accept-Language is not provided
    'charset'          => 'utf-8'    // not required
];
```

Here you have to make [`MaintenanceScreen\TranslatorProvider\TranslatorProviderInterface`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html) instance
and you have two included methods:
- Use translations from array ([`MaintenanceScreen\TranslatorProvider\ArrayTranslatorProvider`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html) class)
- Use translations from config files ([`MaintenanceScreen\TranslatorProvider\FilesystemTranslatorProvider`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html) class)

A simple example for first method here:
```php
$translatorsProvider = new ArrayTranslatorProvider([
    'en' => ['title' => 'Title', 'text' => 'Text'],
    'ru' => ['title' => 'Заголовок', 'text' => 'Текст']
]);
```

Now you must make a `\Twig_Environment` instance:
```php
// Twig_Environment
$twig = new \Twig_Environment(
    new \Twig_Loader_Filesystem([__DIR__.'/Resources/templates'], __DIR__),
    ['cache' => __DIR__.'/Resources/twig_cache']
);
```

And, finally, [`MaintenanceScreen\MaintenanceScreen`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/MaintenanceScreen.html) instance:
```php
$maintenanceScreen = new MaintenanceScreen($config, $translatorProvider, $twig);
```

When you have an instance of [`MaintenanceScreen\MaintenanceScreen`](https://progminer.github.io/maintenance-screen/twig-splitting/MaintenanceScreen/MaintenanceScreen.html)
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

Autogenerated documentation is available [here](https://progminer.github.io/maintenance-screen/twig-splitting/twig-splitting/).

### Todo

- Make library separated from configuration files needing
- Make library separated from templates format
