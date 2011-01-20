<?php

namespace Assetic\Cache;

/*
 * This file is part of the Assetic package.
 *
 * (c) Kris Wallsmith <kris.wallsmith@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A simple filesystem cache.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class FilesystemCache implements CacheInterface
{
    private $dir;

    public function __construct($dir, $lifetime = 3600)
    {
        $this->dir = $dir;
    }

    public function has($key)
    {
        return file_exists($this->dir.'/'.$key);
    }

    public function get($key)
    {
        return file_get_contents($this->dir.'/'.$key);
    }

    public function set($key, $value)
    {
        file_put_contents($this->dir.'/'.$key, $value);
    }

    public function remove($key)
    {
        unlink($this->dir.'/'.$key);
    }
}
