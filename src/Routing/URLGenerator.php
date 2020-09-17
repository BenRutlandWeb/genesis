<?php

namespace Genesis\Routing;

class URLGenerator
{
    /**
     * Assign the theme base URI
     */
    public function __construct($app)
    {
        $this->baseURI = $app->get('config')->get('url');
    }

    /**
     * Generate the URL to an application asset.
     *
     * @param  string  $path
     * @return string
     */
    public function asset($path): string
    {
        if ($this->isValidUrl($path)) {
            return $path;
        }
        return $this->baseURI . '/assets/' . $path;
    }

    /**
     * Determine if the given path is a valid URL.
     *
     * @param string $path
     * @return bool
     */
    public function isValidUrl($path): bool
    {
        if (!preg_match('~^(#|//|https?://|(mailto|tel|sms):)~', $path)) {
            return filter_var($path, FILTER_VALIDATE_URL) !== false;
        }
        return true;
    }
}
