<?php

namespace Yaza\LaravelGoogleDriveStorage\Commands;

use Illuminate\Console\Command;

class LaravelGoogleDriveStorageCommand extends Command
{
    public $signature = 'laravel-google-drive-storage';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
