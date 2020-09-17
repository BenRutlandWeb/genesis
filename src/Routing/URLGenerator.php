<?php

namespace Genesis\Routing;

use Psr\Container\ContainerInterface;

class URLGenerator
{
    /**
     * Assign the theme root URI
     *
     * @param \Psr\Container\ContainerInterface $app
     *
     * @return void
     */
    public function __construct(ContainerInterface $app)
    {
        $this->url = $app->get('config')->get('url');
    }

    /**
     * Generate the URL to an application asset.
     *
     * @param string $path
     *
     * @return string
     */
    public function asset(string $path): string
    {
        if ($this->isValidUrl($path)) {
            return $path;
        }
        return $this->url . '/assets/' . $path;
    }

    /**
     * Determine if the given path is a valid URL.
     *
     * @param string $path
     *
     * @return bool
     */
    public function isValidUrl(string $path): bool
    {
        if (!preg_match('~^(#|//|https?://|(mailto|tel|sms):)~', $path)) {
            return filter_var($path, FILTER_VALIDATE_URL) !== false;
        }
        return true;
    }
}
