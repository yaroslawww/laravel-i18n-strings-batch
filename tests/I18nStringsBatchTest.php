<?php

namespace I18nStringsBatch\Tests;

use I18nStringsBatch\Facades\I18nStringsBatch;
use I18nStringsBatch\I18nStringsBatchManager;
use Illuminate\Support\Str;

class I18nStringsBatchTest extends TestCase
{
    /** @test */
    public function batch_return_array_even_if_empty()
    {
        $result = I18nStringsBatch::getBatch('not-exists-foo');
        $this->assertEmpty($result);
        $this->assertIsArray($result);

        $result = I18nStringsBatch::getBatch(['not-exists-foo', 'not-exists-bar']);
        $this->assertEmpty($result);
        $this->assertIsArray($result);
    }

    /** @test */
    public function batch_return_array_only_of_existing_strings()
    {
        $result = I18nStringsBatch::getBatch(['not-exists-foo', 'auth', 'not-exists-bar']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertTrue(isset($result['failed']));
    }

    /** @test */
    public function batch_json_return_string()
    {
        $result = I18nStringsBatch::getBatchJson('auth');
        $this->assertTrue(Str::contains($result, 'failed'));
        $this->assertTrue(isset(json_decode($result, true)['failed']));
    }

    /** @test */
    public function use_file_from_directory()
    {
        I18nStringsBatchManager::setDefaultDirectoryPrefix('example-js');
        $result = I18nStringsBatch::getBatch('test');
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertTrue(isset($result['foo']));
        $this->assertEquals('bar', $result['foo']);
    }

    /** @test */
    public function getters_and_setters()
    {
        I18nStringsBatchManager::setDefaultDirectoryPrefix('');

        $this->assertNull(I18nStringsBatch::getLocale());
        I18nStringsBatch::setLocale('fr');
        $this->assertEquals('fr', I18nStringsBatch::getLocale());

        $this->assertEmpty(I18nStringsBatch::getDirectoryPrefix());
        I18nStringsBatch::setDirectoryPrefix('example-js');
        $this->assertEquals('example-js', I18nStringsBatch::getDirectoryPrefix());

        $this->assertEquals(15, I18nStringsBatch::getJsonFlags());
        I18nStringsBatch::setJsonFlags(JSON_HEX_APOS);
        $this->assertEquals(JSON_HEX_APOS, I18nStringsBatch::getJsonFlags());

        $this->assertEquals(512, I18nStringsBatch::getJsonDepth());
        I18nStringsBatch::setJsonDepth(20);
        $this->assertEquals(20, I18nStringsBatch::getJsonDepth());
    }

    /** @test */
    public function exception_if_not_exists_mentod()
    {
        $this->expectException(\BadMethodCallException::class);
        I18nStringsBatch::notExistsMethos();
    }
}
