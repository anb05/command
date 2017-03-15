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

    private $location = "";
    private $fullName = "";
    private $level = self::OFF;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = trim("CeilingFan" . $this->location);
        $this->level = self::OFF;
    }

    public function high()
    {
        //turns the ceiling fan on to high speed
        $this->level = self::HIGH;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = "Ceiling fan in " . $this->location . " is on high";
    }

    public function medium()
    {
        //turns the ceiling fan on to medium speed
        $this->level = self::MEDIUM;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = "Ceiling fan in " . $this->location . " is on medium";
    }

    public function low()
    {
        //turns the ceiling fan on to medium speed
        $this->level = self::LOW;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = "Ceiling fan in " . $this->location . " is on low";
    }

    public function off()
    {
        //turns the ceiling fan on to medium speed
        $this->level = self::OFF;
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = "Ceiling fan in " . $this->location . " is off";
    }

    public function getSpeed()
    {
        return $this->level;
    }
 }