<?php
/**
 */

namespace Command\Models;


class TV
{
    private $location ="";
    private $fullName = "";
    private $channel = 0;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = trim($this->location . " TV");
    }

    public function on() : void
    {
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = $this->location . " TV is on";
    }

    public function off() : void
    {
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = $this->location . " TV is off";
    }

    public function setInputChannel(int $chanel=3) : void
    {
        $this->channel = $chanel;
        $_SESSION['message'][$this->fullName] = $this->location . " TV channel is set for DVD";
    }
}