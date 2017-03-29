<?php
/**
 */

namespace Command\Models;


class Stereo
{
    private $name = 'Stereo';
    private $location;
    private $fullName;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = $location . ' ' . $this->name;
    }

    public function on() : void
    {
        $_SESSION['power'][$this->fullName . " On"] = 1;
        $_SESSION['message'][$this->fullName . " On"] = str_replace('On','',$this->location) . " is on";
    }

    public function off() : void
    {
        $_SESSION['power'][$this->fullName . " On"] = 0;
        $_SESSION['message'][$this->fullName . " On"] = str_replace('On','',$this->location) . " is off";
    }

    public function setCD() : void
    {
        $_SESSION['message'][$this->fullName . " setCD"] = str_replace('On','',$this->location) . " is set for CD input";
    }

    public function setDVD() : void
    {
        $_SESSION['message'][$this->fullName . " setDVD"] = str_replace('On','',$this->location) . " is set for DVD input";
    }

    public function setRadio() : void
    {
        $_SESSION['message'][$this->fullName . " setRadio"] = str_replace('On','',$this->location) . " is set for Radio";
    }

    public function setVolume(int $volume) : void
    {
        // code to set the volume
        // valid range: 1-11 (after all 11 is better than 10, right?)

        $_SESSION['message'][$this->location]  = str_replace('On','',$this->location) . " Stereo volume set to ";
        $_SESSION['message'][$this->location] .= $volume;
    }
}