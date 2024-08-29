<?php

declare(strict_types=1);

namespace Angkor\Khmercut\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Angkor\Khmercut\KhmercutServiceProvider::class,
        ];
    }
}
