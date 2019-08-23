<?php

namespace Benchmarks\Iteration;

class Iterator implements \Iterator
{
    private $position = 0;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->data[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }
}
