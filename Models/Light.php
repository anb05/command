<?php
/**
 */

namespace Command\Models;


class Light
{
    private $location = "";

    private $fullName = "";

    private $level;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = trim($this->location . " Light");
        $this->level = 0;
    }

    public function on() : void
    {
        $this->level = 100;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = "Light in " . $this->location . " is on";
    }

    public function off() : void
    {
        $this->level = 0;
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] = "Light in " . $this->location . " is off";
    }

    public function dim(int $level) : void
    {
        $this->level = $level;
        if ($level === 0) {
            $this->off();
        } else {
            $_SESSION['message'][$this->fullName] = 'Light in' . $this->fullName . 'is dimmed to ' . $this->level . '%';
        }
    }

    public function getLevel() : int
    {
        return $this->level;
    }
}