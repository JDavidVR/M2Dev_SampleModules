<?php

namespace M2Dev\PatternProxy\Model;

class Slow
{
    protected $sec = 10;

    public $hello = 'Initial Varialbe Value.';

    public function __construct()
    {
        sleep($this->sec);
    }

    /**
     * @return string
     */
    private function printHello()
    {
        return "After {$this->sec} variable.";
    }

    public function getHello()
    {
        return $this->hello;
    }
}
