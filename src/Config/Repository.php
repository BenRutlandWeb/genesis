<?php

namespace Genesis\Config;

class Repository
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(string $key)
    {
        return $this->items[$key];
    }
}
