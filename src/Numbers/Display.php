<?php
namespace Numbers;

require "vendor/autoload.php";

class Display
{

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function output(): string
    {
        return $this->type->decideNumbers()->render();
    }
}