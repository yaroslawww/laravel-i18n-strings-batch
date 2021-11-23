<?php

namespace I18nStringsBatch;

class I18nStringsBatchManager
{
    public static string $defaultDirectory = '';

    protected array $instances = [];

    public static function setDefaultDirectoryPrefix(string $defaultDirectory)
    {
        static::$defaultDirectory = $defaultDirectory;
    }

    public function batch(?string $directory = null): I18nStringsBatch
    {
        return $this->resolveBatch($directory ?? static::$defaultDirectory);
    }

    protected function resolveBatch(string $directory): I18nStringsBatch
    {
        if (isset($this->instances[$directory])) {
            return $this->instances[$directory];
        }

        return $this->instances[$directory] = new I18nStringsBatch($directory);
    }

    public function __call(string $method, array $arguments)
    {
        $batch = $this->batch();
        if (method_exists($batch, $method)) {
            return $batch->{$method}(...$arguments);
        }

        throw new \BadMethodCallException("Method [{$method}] not exists");
    }
}
