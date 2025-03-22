<?php

namespace Yaza\LaravelGoogleDriveStorage;

use File;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\interfaces\GdriveInterface;

class Gdrive implements GdriveInterface
{
    /**
     * get file from gdrive
     *
     * @return mixed
     */
    public static function get($file_path)
    {
        $fileinfo = self::getFileInfo($file_path);

        $rawData = Storage::disk('google')->get($fileinfo->path);

        return (object) [
            'file' => $rawData,
            'ext' => $fileinfo->ext,
            'filename' => $fileinfo->filename,
        ];
    }

    /**
     * read file to stream
     *
     * @return mixed|object
     */
    public static function readStream($filepath)
    {
        $fileinfo = self::getFileInfo($filepath);

        $readStream = Storage::disk('google')->getDriver()->readStream($fileinfo->path);

        return (object) [
            'file' => $readStream,
            'ext' => $fileinfo->ext,
            'filename' => $fileinfo->filename,
        ];
    }

    /**
     * put file
     *
     * @param  $location
     * @param  bool  $random_file_name
     * @return mixed|void
     */
    public static function put($path, $file)
    {
        Storage::disk('google')->put($path, File::get($file));
    }

    /**
     * get file info
     *
     * @return mixed|object
     */
    public static function getFileInfo($file_path)
    {
        $path = str_replace('\\', '/', $file_path);
        $arr = explode('/', $path);
        $file_name = end($arr);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        return (object) [
            'filename' => $file_name,
            'ext' => $ext,
            'path' => $path,
        ];
    }

    /**
     * delete file
     *
     * @return mixed|void
     */
    public static function delete($path)
    {
        $fileinfo = self::getFileInfo($path);

        Storage::disk('google')->delete($fileinfo->path);
    }

    /**
     * make directory
     *
     * @return mixed|void
     */
    public static function makeDir($dirname)
    {
        Storage::disk('google')->makeDirectory($dirname);
    }

    /**
     * delete directory
     *
     * @return mixed|void
     */
    public static function deleteDir($dirpath)
    {
        Storage::disk('google')->deleteDirectory($dirpath);
    }

    /**
     * rename directory
     *
     * @return mixed|void
     */
    public static function renameDir($dirpath, $newdirname)
    {
        Storage::disk('google')->move($dirpath, $newdirname);
    }

    /**
     * all folder
     *
     * @param  bool  $recursive
     * @return mixed
     */
    public static function all($path, $recursive = true)
    {
        $contents = collect(Storage::disk('google')->listContents($path, $recursive));

        return $contents;
    }
}
