<?php

namespace Yaza\LaravelGoogleDriveStorage\Commands;

use Illuminate\Console\Command;

class LaravelGoogleDriveStorageCommand extends Command
{
    public $signature = '
        gdrive:config {name : The name of command}
    ';

    public $description = 'Publish Config Gdrive';

    public function handle(): int
    {
        try {
            return self::SUCCESS;
        } catch (\Exception $exception) {
            return self::FAILURE;
        }
    }
}
