<?php

namespace I18nStringsBatch\Facades;

use I18nStringsBatch\I18nStringsBatchManager;
use Illuminate\Support\Facades\Facade;

class I18nStringsBatch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return I18nStringsBatchManager::class;
    }
}
