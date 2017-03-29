<?php
/**
 */

namespace Command\Models;


class CeilingFan
{
    const HIGH   = 3;
    const MEDIUM = 2;
    const LOW    = 1;
    const OFF    = 0;

    private $name = "CeilingFan";
    private $location = "";
    private $speed;

    public function __construct(string $location)
    {
        $this->location = $location;
        if (!isset($_SESSION[$location . " " . 'CeilingFan'])) {
            $_SESSION[$location . " " . 'CeilingFan'] = self::OFF;
        }
    }

    public function high()
    {
        //turns the ceiling fan on to high speed
        $this->speed = self::HIGH;
        $_SESSION['power'][$this->location . " " . $this->name . " High"]     = 1;
        $_SESSION['power'][$this->location . " " . $this->name . " Medium"]   = 1;
        $_SESSION['power'][$this->location . " " . $this->name . " Low"]      = 1;
        $_SESSION['message'][$this->location . " " . $this->name . " High"]   = "Ceiling fan in " . $this->location . " is on high";
        $_SESSION['message'][$this->location . " " . $this->name . " Medium"] = "";
        $_SESSION['message'][$this->location . " " . $this->name . " Low"]    = "";
    }

    public function medium()
    {
        //turns the ceiling fan on to medium speed
        $this->speed = self::MEDIUM;
        $_SESSION['power'][$this->location . " " . $this->name . " High"]     = 0;
        $_SESSION['power'][$this->location . " " . $this->name . " Medium"]   = 1;
        $_SESSION['power'][$this->location . " " . $this->name . " Low"]      = 1;
        $_SESSION['message'][$this->location . " " . $this->name . " High"]   = "";
        $_SESSION['message'][$this->location . " " . $this->name . " Medium"] = "Ceiling fan in " . $this->location . " is on medium";
        $_SESSION['message'][$this->location . " " . $this->name . " Low"]    = "";
    }

    public function low()
    {
        //turns the ceiling fan on to medium speed
        $this->speed = self::LOW;
        $_SESSION['power'][$this->location . " " . $this->name . " High"]     = 0;
        $_SESSION['power'][$this->location . " " . $this->name . " Medium"]   = 0;
        $_SESSION['power'][$this->location . " " . $this->name . " Low"]      = 1;
        $_SESSION['message'][$this->location . " " . $this->name . " High"]   = "";
        $_SESSION['message'][$this->location . " " . $this->name . " Medium"] = "";
        $_SESSION['message'][$this->location . " " . $this->name . " Low"]    = "Ceiling fan in " . $this->location . " is on low";
    }

    public function off()
    {
        $_SESSION['power'][$this->location . " " . $this->name . " High"] = 0;
        $_SESSION['power'][$this->location . " " . $this->name . " Medium"] = 0;
        $_SESSION['power'][$this->location . " " . $this->name . " Low"] = 0;
        switch ($this->speed) {
            case self::HIGH:
                $level = " High";
                break;
            case self::MEDIUM:
                $level = " Medium";
                break;
            case self::LOW:
                $level = " Low";
                break;
        }
        $_SESSION['message'][$this->location . " " . $this->name . $level] = "Ceiling fan in " . $this->location . " is off";
        $this->speed = self::OFF;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
 }