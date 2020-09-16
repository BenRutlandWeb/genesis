<?php

namespace Genesis\Routing;

use Genesis\Http\Request;

class CSRFToken
{
    /**
     * The Request object.
     *
     * @var \Genesis\Http\Request $request
     */
    protected $request;

    /**
     * Set the request object.
     *
     * @param \Genesis\Http\Request $request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Verify the token.
     *
     * @return bool
     */
    public function verify(): bool
    {
        return $this->isReading() || $this->tokensMatch();
    }

    /**
     * Check if the HTTP request uses a "read" verb.
     *
     * @return bool
     */
    public function isReading(): bool
    {
        return in_array($this->request->getMethod(), ['HEAD', 'GET', 'OPTIONS']);
    }

    /**
     * Verify the CSRF tokens match.
     *
     * @return bool
     */
    public function tokensMatch(): bool
    {
        return (bool) wp_verify_nonce($this->getTokenFromRequest(), '_token');
    }

    /**
     * Get the CSRF token from the request.
     *
     * @return string
     */
    public function getTokenFromRequest(): string
    {
        return $this->request->get('_token') ?: $this->request->header('X-CSRF-TOKEN') ?: '';
    }

    /**
     * Return the CSRF input fields.
     *
     * @return string
     */
    public function field(): string
    {
        return wp_nonce_field('_token', '_token');
    }
}
