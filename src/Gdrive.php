<?php

namespace Yaza\LaravelGoogleDriveStorage;

use File;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\DirectoryListing;
use League\Flysystem\StorageAttributes;
use Yaza\LaravelGoogleDriveStorage\interfaces\GdriveInterface;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFile;
use Yaza\LaravelGoogleDriveStorage\typings\GdriveFileInfo;

class Gdrive implements GdriveInterface
{
    /**
     * Get file from gdrive
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
     */
    public static function put(string $path, string $file): void
    {
        Storage::disk('google')->put($path, File::get($file));
    }

    /**
     * Get file info
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
     */
    public static function delete(string $path): void
    {
        $fileinfo = self::getFileInfo($path);

        Storage::disk('google')->delete($fileinfo->path);
    }

    /**
     * Make directory
     */
    public static function makeDir(string $dirname): void
    {
        Storage::disk('google')->makeDirectory($dirname);
    }

    /**
     * Delete directory
     */
    public static function deleteDir(string $dirpath): void
    {
        Storage::disk('google')->deleteDirectory($dirpath);
    }

    /**
     * Rename directory
     */
    public static function renameDir(string $dirpath, string $newdirname): void
    {
        Storage::disk('google')->move($dirpath, $newdirname);
    }

    /**
     * All folder
     *
     * @return DirectoryListing<StorageAttributes>
     */
    public static function all(string $path, bool $recursive = true)
    {
        $contents = collect(Storage::disk('google')->listContents($path, $recursive));

        return $contents;
    }
}
