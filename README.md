# i18n strings batch

[![Packagist License](https://img.shields.io/packagist/l/yaroslawww/laravel-i18n-strings-batch?color=%234dc71f)](https://github.com/yaroslawww/laravel-i18n-strings-batch/blob/master/LICENSE.md)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/laravel-i18n-strings-batch)](https://packagist.org/packages/yaroslawww/laravel-i18n-strings-batch)
[![Build Status](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/badges/build.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-i18n-strings-batch/?branch=master)

## Installation

Install the package via composer:

```bash
composer require yaroslawww/laravel-i18n-strings-batch
```

## Usage

#### Set specific directory for language strings.

As usually js strings has other formatting for `choise` and others - you will want set all js strings to specific
directory and call batches without specify directory each time:

```injectablephp
use I18nStringsBatch\I18nStringsBatchManager;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        I18nStringsBatchManager::setDefaultDirectoryPrefix('front-js');
    }
}
```

#### Usage in php

```injectablephp
\I18nStringsBatch\Facades\I18nStringsBatch::getBatch(["licenses-list", "modal-confirmation"]);
\I18nStringsBatch\Facades\I18nStringsBatch::getBatchJson(["licenses-list", "modal-confirmation"]);
// or
\I18nStringsBatch\Facades\I18nStringsBatch::getBatch("modal-confirmation");
\I18nStringsBatch\Facades\I18nStringsBatch::getBatchJson("modal-confirmation");

// Using helpers
i18n_strings_batch(["licenses-list", "modal-confirmation"])
i18n_strings_batch_json(["licenses-list", "modal-confirmation"])
// or
i18n_strings_batch("modal-confirmation")
i18n_strings_batch_json("modal-confirmation")
```

#### Usage with component

```html
<licenses-list
    :i18n-batch='@transBatch("licenses-list")'
/>
<!-- or -->
<licenses-list
    :i18n-batch='@transBatch(["licenses-list", "modal-confirmation"])'
/>
```

### Usage with vue

Example you can find [there](./docs/vue.md)

### Add directive to PHPStorm

![](./docs/assets/phpstorm.png)

```txt
transBatch
<?php echo i18n_strings_batch_json(
); ?>
```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/)
