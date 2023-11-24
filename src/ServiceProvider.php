<?php

namespace I18nStringsBatch;

use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        /* @deprecated - phpstorm not supports num regex */
        Blade::directive('i18nBatch', function ($expression) {
            return "<?php echo i18n_strings_batch_json($expression); ?>";
        });

        Blade::directive('transBatch', function ($expression) {
            return "<?php echo i18n_strings_batch_json($expression); ?>";
        });

        $this->publishes([
            __DIR__ . '/../resources/' => public_path('vendor/i18n_strings_batch'),
        ], 'i18n-string-batch-resources');
    }

    public function register()
    {
        $this->app->bind(I18nStringsBatchManager::class, function () {
            return new I18nStringsBatchManager();
        });
    }
}
