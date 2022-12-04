<?php

namespace Yaza\LaravelGoogleDriveStorage\interfaces;

interface GdriveInterface
{
    /**
     * get file
     *
     * @param $file_path
     * @return mixed
     */
    public static function get($file_path);

    /**
     * read file with stream
     *
     * @param $filepath
     * @return mixed
     */
    public static function readStream($filepath);

    /**
     * put file
     *
     * @param $file
     * @return mixed
     */
    public static function put($path, $file);

    /**
     * delete file
     *
     * @param $path
     * @return mixed
     */
    public static function delete($path);

    /**
     * make directory
     *
     * @param $dirname
     * @return mixed
     */
    public static function makeDir($dirname);

    /**
     * delete directory
     *
     * @param $dirpath
     * @return mixed
     */
    public static function deleteDir($dirpath);

    /**
     * rename directory
     *
     * @param $dirpath
     * @param $newdirname
     * @return mixed
     */
    public static function renameDir($dirpath, $newdirname);

    /**
     * get file info
     *
     * @param $path
     * @return mixed
     */
    public static function getFileInfo($path);

    /**
     * all folder & file
     *
     * @param $recursive
     * @return mixed
     */
    public static function all($path, $recursive);
}
