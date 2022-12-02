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
        if ($this->argument('name') == 'publish') {
            try {
                $config = config('filesystems.disk');
                array_push($config, [
                    'google' => [
                        'driver' => 'google',
                        'clientId' => env('GOOGLE_DRIVE_CLIENT_ID'),
                        'clientSecret' => env('GOOGLE_DRIVE_CLIENT_SECRET'),
                        'refreshToken' => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
                        'folder' => env('GOOGLE_DRIVE_FOLDER_ID'), // without folder is root of drive or team drive
                        //'teamDriveId' => env('GOOGLE_DRIVE_TEAM_DRIVE_ID'),
                    ],
                ]);

                return self::SUCCESS;
            } catch (\Exception $exception) {
                return self::FAILURE;
            }
        } else {
            $this->comment('Mungkin yg dimagsud adalah `publish`');
        }
    }
}
