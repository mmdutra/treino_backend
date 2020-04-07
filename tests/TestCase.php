<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        \Illuminate\Support\Facades\Artisan::call('migrate');
        \Illuminate\Support\Facades\Artisan::call('db:seed');

        return $app;
    }
}
