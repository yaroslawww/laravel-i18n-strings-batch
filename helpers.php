<?php

if (! function_exists('i18n_strings_batch')) {
    /**
     * Get translations batch.
     *
     * @param string|array $keys
     * @param string|null  $locale
     *
     * @return array
     */
    function i18n_strings_batch(string|array $keys, ?string $locale = null): array
    {
        return \I18nStringsBatch\Facades\I18nStringsBatch::setLocale($locale)->getBatch($keys);

    }
}

if (! function_exists('i18n_strings_batch_json')) {
    /**
     * Get translations batch encoded in json.
     *
     * @param string|array $keys
     * @param string|null  $locale
     * @return string
     */
    function i18n_strings_batch_json(string|array $keys, ?string $locale = null): string
    {
        return \I18nStringsBatch\Facades\I18nStringsBatch::setLocale($locale)->getBatchJson($keys);
    }
}
