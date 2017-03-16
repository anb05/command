<?php
/**
 */

namespace Command\Models;


class GarageDoor
{
    private $location = "";
    private $fullName = "";

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = trim($this->location . "GarageDoor");
    }

    public function up() : void
    {
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = $this->location . " garage Door is Up";
    }

    public function down() : void
    {
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = $this->location . " garage Door is Down";
    }

    public function stop() : void
    {
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = $this->location . " garage Door is Stopped";
    }

    public function lightOn() : void
    {
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = $this->location . " garage light is on";
    }

    public function lightOff() : void
    {
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = $this->location . " garage light is off";
    }
}