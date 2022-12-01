<?php

return [
    'disks' => [
        'google' => [
            'driver' => 'google',
            'clientId' => env('GOOGLE_DRIVE_CLIENT_ID'),
            'clientSecret' => env('GOOGLE_DRIVE_CLIENT_SECRET'),
            'refreshToken' => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
            'folder' => env('GOOGLE_DRIVE_FOLDER_ID'), // without folder is root of drive or team drive
            //'teamDriveId' => env('GOOGLE_DRIVE_TEAM_DRIVE_ID'),
        ],
    ],
];
