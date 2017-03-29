<?php
/**
 */

namespace Command\Models;


class GarageDoor
{
    private $name = "GarageDoor";
    private $location = "";
    private $fullName;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = trim($location . " " . $this->name);
    }

    public function up() : void
    {
        $_SESSION['power'][$this->fullName . " Up"] = 1;
        $_SESSION['message'][$this->fullName . " Up"] = "Garage Door is Up";
    }

    public function down() : void
    {
        $_SESSION['power'][$this->fullName . " Up"] = 0;
        $_SESSION['message'][$this->fullName . " Up"] ="Garage Door is Down";
    }

    public function stop() : void
    {
        $_SESSION['power'][$this->fullName . " Up"] = 0;
        $_SESSION['message'][$this->fullName . " Up"] ="Garage Door is Stopped";
    }

    public function lightOn() : void
    {
        $_SESSION['power'][$this->fullName . " Up"] = 1;
        $_SESSION['message'][$this->fullName . " Up"] ="Garage light is on";
    }

    public function lightOff() : void
    {
        $_SESSION['power'][$this->fullName . " Up"] = 0;
        $_SESSION['message'][$this->fullName . " Up"] ="Garage light is off";
    }
}