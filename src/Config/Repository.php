<?php

namespace Genesis\Config;

class Repository
{
    /**
     * The items from the config.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Set the repository items.
     *
     * @param array $items
     *
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Get an item from the repositoy.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->items[$key];
    }
}
