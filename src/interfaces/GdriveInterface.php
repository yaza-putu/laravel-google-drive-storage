<?php

namespace Yaza\LaravelGoogleDriveStorage\interfaces;

interface GdriveInterface
{
    /**
     * get file
     *
     * @return mixed
     */
    public static function get($file_path);

    /**
     * read file with stream
     *
     * @return mixed
     */
    public static function readStream($filepath);

    /**
     * put file
     *
     * @return mixed
     */
    public static function put($path, $file);

    /**
     * delete file
     *
     * @return mixed
     */
    public static function delete($path);

    /**
     * make directory
     *
     * @return mixed
     */
    public static function makeDir($dirname);

    /**
     * delete directory
     *
     * @return mixed
     */
    public static function deleteDir($dirpath);

    /**
     * rename directory
     *
     * @return mixed
     */
    public static function renameDir($dirpath, $newdirname);

    /**
     * get file info
     *
     * @return mixed
     */
    public static function getFileInfo($path);

    /**
     * all folder & file
     *
     * @return mixed
     */
    public static function all($path, $recursive);
}
