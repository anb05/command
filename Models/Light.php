<?php
/**
 */

namespace Command\Models;


class Light
{
    private $name;
    private $location = "";

    private $fullName;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->fullName = $location . " Light On";
        if (!isset($_SESSION[$location . " " . $this->name])) {
            $_SESSION[$location . " " . $this->name] = 0;
        }
    }

    public function on() : void
    {
        $_SESSION[$this->location . " " . $this->name] = 100;
        $_SESSION['power'][$this->fullName] = 1;
        $_SESSION['message'][$this->fullName] = str_replace('On', '', $this->fullName) . " is on";
    }

    public function off() : void
    {
        $_SESSION[$this->location . " " . $this->name] = 0;
        $_SESSION['power'][$this->fullName] = 0;
        $_SESSION['message'][$this->fullName] =  str_replace('On', '', $this->fullName) . " is off";
    }

    public function dim(int $level) : void
    {
        $_SESSION[$this->location . " " . $this->name] = $level;
        if ($level === 0) {
            $this->off();
        } else {
            $_SESSION['message'][$this->fullName]  = 'Light in' . $this->fullName;
            $_SESSION['message'][$this->fullName] .= 'is dimmed to ';
            $_SESSION['message'][$this->fullName] .= $_SESSION[$this->location . " " . $this->name] . '%';
        }
    }

    public function getLevel() : int
    {
        return $_SESSION[$this->location . " " . $this->name];
    }
}