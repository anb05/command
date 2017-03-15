<?php
/**
 */

namespace Command\Models;


class Hottab
{
    private $on;
    private $temperature;
    private $fullName = "";

    public function __construct()
    {
        $this->fullName = trim("Hottub");
        $this->temperature = 10;
    }

    public function on() : void
    {
        $this->on = true;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = "Hottub is on";
    }

    public function off() : void
    {
        $this->on = false;
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = "Hottub is off";
    }

    public function circulate() : void
    {
        if ($this->on) {
            $_SESSION['message'][$this->fullName] .= " and bubbling!";
        }
    }

    public function jetsOn() : void
    {
        if ($this->on) {
            $_SESSION['message'][$this->fullName] .= " anb jets are on";
        }
    }

    public function jetsOff() : void
    {
        if ($this->on) {
            $_SESSION['message'][$this->fullName] .= " but jets are off";
        }
    }

    public function setTemperature(int $temperature) : void
    {
        $this->temperature = $temperature;
    }

    public function heat(int $temperature) : void
    {
        $this->temperature = 105;
        $_SESSION['message'][$this->fullName] .= " Hottub is heating to a steaming 105 degrees";
    }

    public function cool(int $temperature) : void
    {
        $this->temperature = 98;
        $_SESSION['message'][$this->fullName] .= " Hottub is cooling to a steaming 98 degrees";
    }
}