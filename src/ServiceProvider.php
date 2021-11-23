<?php

namespace I18nStringsBatch;

use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        Blade::directive('i18nBatch', function ($expression) {
            return "<?php echo i18n_strings_batch_json($expression); ?>";
        });
    }

    public function register()
    {
        $this->app->bind(I18nStringsBatchManager::class, function () {
            return new I18nStringsBatchManager();
        });
    }
}
