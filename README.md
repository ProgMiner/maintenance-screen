# Maintenance Screen 

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d1fe8efba0e84a26afc9669bf45eb966)](https://www.codacy.com/app/LantosBro/maintenance-screen?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=LantosBro/maintenance-screen&amp;utm_campaign=Badge_Grade) [![Maintainability](https://api.codeclimate.com/v1/badges/3ab7ecb0351025633fc3/maintainability)](https://codeclimate.com/github/LantosBro/maintenance-screen/maintainability)

The "Maintenance mode" screen library

- [Installation](#Installation)
- [Usage](#usage)
- [Documentation](#documentation)

### Installation

```bash
composer require progminer/maintenance-screen
```

### Usage

The basic usage is calling the `MaintenanceScreen::makeFrom` method with default arguments and path to your config file:

```php
$maintenanceScreen = MaintenanceScreen::makeFrom('config.yml', new ConfigurationLoader([__DIR__.'/Resources']));
```
### Documentation

In progress
