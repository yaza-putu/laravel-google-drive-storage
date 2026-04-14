<?php

namespace Yaza\LaravelGoogleDriveStorage\typings;

class GdriveFileInfo
{
    public function __construct(
        public array|string $ext,
        public string $filename,
        public string $path,
    ) {}
}
