<?php

namespace Yaza\LaravelGoogleDriveStorage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yaza\LaravelGoogleDriveStorage\LaravelGoogleDriveStorage
 */
class LaravelGoogleDriveStorage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Yaza\LaravelGoogleDriveStorage\LaravelGoogleDriveStorage::class;
    }
}
