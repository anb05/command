<?php
/**
 */

namespace Command\Models;


class TV
{
    private $name = "TV";
    private $location ="";
    private $fllName;
    private $channel = 0;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fllName = $location . " " . $this->name;
    }

    public function on() : void
    {
        $_SESSION['power'][$this->fllName . " On"] = 1;
        $_SESSION['message'][$this->fllName . " On"] = $this->location . " is on";
    }

    public function off() : void
    {
        $_SESSION['power'][$this->fllName . " On"] = 0;
        $_SESSION['message'][$this->fllName . " On"] = str_replace('On','', $this->location) . " is off";
    }

    public function setInputChannel(int $chanel=3) : void
    {
        $this->channel = $chanel;
        $_SESSION['message'][$this->fllName . " On"] =  str_replace('On','', $this->location) . " channel is set for DVD";
    }
}