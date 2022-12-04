<?php


namespace Yaza\LaravelGoogleDriveStorage\interfaces;


interface GdriveInterface
{
    /**
     * get file
     * @param $file_path
     * @return mixed
     */
    static public function get($file_path);

    /**
     * read file with stream
     * @param $filepath
     * @return mixed
     */
    static public function readStream($filepath);

    /**
     * put file
     * @param $file
     * @return mixed
     */
    static public function put($location,$file, $random_file_name);

    /**
     * delete file
     * @param $path
     * @return mixed
     */
    static public function delete($path);

    /**
     * make directory
     * @param $dirname
     * @return mixed
     */
    static public function makeDir($dirname);

    /**
     * delete directory
     * @param $dirpath
     * @return mixed
     */
    static public function deleteDir($dirpath);

    /**
     * rename directory
     * @param $dirpath
     * @param $newdirname
     * @return mixed
     */
    static public function renameDir($dirpath, $newdirname);

    /**
     * get file info
     * @param $path
     * @return mixed
     */
    static public function getFileInfo($path);
}
