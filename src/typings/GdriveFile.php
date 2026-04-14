<?php

namespace Yaza\LaravelGoogleDriveStorage\typings;

class GdriveFile
{
    public function __construct(
        public ?string $file,
        public array|string $ext,
        public string $filename,
        public string $path,
    ) {}
}
