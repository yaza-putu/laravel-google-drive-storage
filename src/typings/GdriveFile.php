<?php

namespace Yaza\LaravelGoogleDriveStorage\typings;

class GdriveFile
{
    public function __construct(
        public string|null $file,
        public array|string $ext,
        public string $filename,
        public string $path,
    ) {}
}
