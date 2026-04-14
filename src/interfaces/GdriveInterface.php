<?php

namespace Yaza\LaravelGoogleDriveStorage\interfaces;

use Yaza\LaravelGoogleDriveStorage\typings\GdriveFile;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFileInfo;
use \League\Flysystem\DirectoryListing;
use \League\Flysystem\StorageAttributes;

interface GdriveInterface
{
    /**
     * Get file
     *
     * @param string $file_path
     * @return GdriveFile
     */
    public static function get(string $file_path);

    /**
     * Read file with stream
     *
     * @param string $filepath
     * @return GdriveFile
     */
    public static function readStream(string $filepath);

    /**
     * Put file
     *
     * @param string $path
     * @param string $file
     * @return void
     */
    public static function put(string $path, string $file);

    /**
     * Delete file
     *
     * @param string $path
     * @return void
     */
    public static function delete(string $path);

    /**
     * Make directory
     *
     * @param string $dirname
     * @return void
     */
    public static function makeDir(string $dirname);

    /**
     * Delete directory
     *
     * @param string $dirpath
     * @return void
     */
    public static function deleteDir(string $dirpath);

    /**
     * Rename directory
     *
     * @param string $dirpath
     * @param string $newdirname
     * @return void
     */
    public static function renameDir(string $dirpath, string $newdirname);

    /**
     * Get file info
     *
     * @param string $path
     * @return GdriveFileInfo
     */
    public static function getFileInfo(string $path);

    /**
     * All folder & file
     *
     * @param string $path
     * @param bool $recursive
     * @return DirectoryListing<StorageAttributes>
     */
    public static function all(string $path, bool $recursive);
}
