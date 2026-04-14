<?php

namespace Yaza\LaravelGoogleDriveStorage;

use File;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\interfaces\GdriveInterface;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFile;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFileInfo;
use \League\Flysystem\DirectoryListing;
use \League\Flysystem\StorageAttributes;

class Gdrive implements GdriveInterface
{
    /**
     * Get file from gdrive
     *
     * @param  string $file_path
     * @return GdriveFile
     */
    public static function get(string $file_path): GdriveFile
    {
        $fileinfo = self::getFileInfo($file_path);

        $rawData = Storage::disk('google')->get($fileinfo->path);

        return new GdriveFile(
            file: $rawData,
            ext: $fileinfo->ext,
            filename: $fileinfo->filename,
            path: $fileinfo->path
        );
    }

    /**
     * Read file to stream
     *
     * @param  string $filepath
     * @return GdriveFile
     */
    public static function readStream(string $filepath): GdriveFile
    {
        $fileinfo = self::getFileInfo($filepath);

        $readStream = Storage::disk('google')->getDriver()->readStream($fileinfo->path);

        return new GdriveFile(
            file: $readStream,
            ext: $fileinfo->ext,
            filename: $fileinfo->filename,
            path: $fileinfo->path
        );
    }

    /**
     * Put file
     *
     * @param  string $path
     * @param  string $file
     * @return void
     */
    public static function put(string $path, string $file): void
    {
        Storage::disk('google')->put($path, File::get($file));
    }

    /**
     * Get file info
     *
     * @param  string $file_path
     * @return GdriveFileInfo
     */
    public static function getFileInfo(string $file_path): GdriveFileInfo
    {
        $path = str_replace('\\', '/', $file_path);
        $arr = explode('/', $path);
        $file_name = end($arr);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        return new GdriveFileInfo(
            filename: $file_name,
            ext: $ext,
            path: $path,
        );
    }

    /**
     * Delete file
     *
     * @param  string $path
     * @return void
     */
    public static function delete(string $path): void
    {
        $fileinfo = self::getFileInfo($path);

        Storage::disk('google')->delete($fileinfo->path);
    }

    /**
     * Make directory
     *
     * @param  string $dirname
     * @return void
     */
    public static function makeDir(string $dirname): void
    {
        Storage::disk('google')->makeDirectory($dirname);
    }

    /**
     * Delete directory
     *
     * @param  string $dirpath
     * @return void
     */
    public static function deleteDir(string $dirpath): void
    {
        Storage::disk('google')->deleteDirectory($dirpath);
    }

    /**
     * Rename directory
     *
     * @param  string $dirpath
     * @param  string $newdirname
     * @return void
     */
    public static function renameDir(string $dirpath, string $newdirname): void
    {
        Storage::disk('google')->move($dirpath, $newdirname);
    }

    /**
     * All folder
     *
     * @param  string   $path
     * @param  bool     $recursive
     * @return DirectoryListing<StorageAttributes>
     */
    public static function all(string $path, bool $recursive = true)
    {
        $contents = collect(Storage::disk('google')->listContents($path, $recursive));

        return $contents;
    }
}
