<?php

namespace Yaza\LaravelGoogleDriveStorage\interfaces;

use League\Flysystem\DirectoryListing;
use League\Flysystem\StorageAttributes;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFile;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFileInfo;

interface GdriveInterface
{
    /**
     * Get file
     *
     * @return GdriveFile
     */
    public static function get(string $file_path);

    /**
     * Read file with stream
     *
     * @return GdriveFile
     */
    public static function readStream(string $filepath);

    /**
     * Put file
     *
     * @return void
     */
    public static function put(string $path, string $file);

    /**
     * Delete file
     *
     * @return void
     */
    public static function delete(string $path);

    /**
     * Make directory
     *
     * @return void
     */
    public static function makeDir(string $dirname);

    /**
     * Delete directory
     *
     * @return void
     */
    public static function deleteDir(string $dirpath);

    /**
     * Rename directory
     *
     * @return void
     */
    public static function renameDir(string $dirpath, string $newdirname);

    /**
     * Get file info
     *
     * @return GdriveFileInfo
     */
    public static function getFileInfo(string $path);

    /**
     * All folder & file
     *
     * @return DirectoryListing<StorageAttributes>
     */
    public static function all(string $path, bool $recursive);
}
