<?php

namespace I18nStringsBatch\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        if (!file_exists(lang_path('en/example-js/test.php'))) {
            mkdir(lang_path('en/example-js'));
            copy(__DIR__ . '/Fixtures/lang/test.php', lang_path('en/example-js/test.php'));
        }
    }

    protected function getPackageProviders($app)
    {
        return [
            \I18nStringsBatch\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
