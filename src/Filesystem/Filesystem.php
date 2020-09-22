<?php

namespace Genesis\Filesystem;

class Filesystem
{
    /**
     * Reads entire file into a string
     *
     * @param string $path
     *
     * @return string
     */
    public function get(string $path): string
    {
        return file_get_contents($path) ?? '';
    }

    /**
     * Write a string to a file
     *
     * @param string $path
     * @param mixed  $data
     *
     * @return int|false
     */
    public function put(string $path, $data)
    {
        return file_put_contents($path, $data);
    }

    /**
     * Checks whether a file or directory exists
     *
     * @param string $path
     *
     * @return boolean
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * Check if the path is a directory.
     *
     * @param string $path
     *
     * @return boolean
     */
    public function isDirectory(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * Make a directory.
     *
     * @param string $path
     *
     * @return boolean
     */
    public function makeDirectory(string $path): bool
    {
        return mkdir($path);
    }
}
