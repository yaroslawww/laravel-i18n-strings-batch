<?php

namespace I18nStringsBatch;

use Illuminate\Support\Str;

class I18nStringsBatch
{
    protected ?string $locale = null;

    protected string $directoryPrefix = '';

    protected mixed $jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;

    protected int $jsonDepth = 512;

    /**
     * @param string      $directoryPrefix
     * @param string|null $locale
     */
    public function __construct(string $directoryPrefix = '', ?string $locale = null)
    {
        $this->directoryPrefix = $directoryPrefix;
        $this->locale          = $locale;
    }

    /**
     * @param string|null $locale
     * @return static
     */
    public function setLocale(?string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string $directoryPrefix
     * @return static
     */
    public function setDirectoryPrefix(string $directoryPrefix): static
    {
        $this->directoryPrefix = $directoryPrefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectoryPrefix(): string
    {
        return $this->directoryPrefix;
    }

    /**
     * @param int|mixed|string $jsonFlags
     */
    public function setJsonFlags(mixed $jsonFlags): static
    {
        $this->jsonFlags = $jsonFlags;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJsonFlags(): mixed
    {
        return $this->jsonFlags;
    }

    /**
     * @param int $jsonDepth
     * @return static
     */
    public function setJsonDepth(int $jsonDepth): static
    {
        $this->jsonDepth = $jsonDepth;

        return $this;
    }

    /**
     * @return int
     */
    public function getJsonDepth(): int
    {
        return $this->jsonDepth;
    }


    public function getBatch(string|array $keys): array
    {
        $batch     = [];
        $directory = trim($this->directoryPrefix, '/');
        foreach ((array) $keys as $key) {
            $key = ltrim($key, '/');
            if ($directory && !Str::startsWith($key, $directory)) {
                $key = "{$directory}/{$key}";
            }
            $messages = app('translator')->get($key, [], $this->locale);
            if (is_array($messages)) {
                $batch = array_merge($batch, $messages);
            }
        }

        return $batch;
    }

    public function getBatchJson(string|array $keys): string
    {
        return json_encode($this->getBatch($keys), $this->jsonFlags, $this->jsonDepth);
    }
}
