<?php
/**
 */

namespace Command\Models;


class Light
{
    private $location;

    private $level;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function on() : void
    {
        $this->level = 100;
        $_SESSION['light'] = 1;
    }

    public function off() : void
    {
        $this->level = 0;
        $_SESSION['light'] = 0;
    }

    public function dim(int $level) : void
    {
        $this->level = $level;
        if ($level === 0) {
            $this->off();
        } else {
            $_SESSION['lightLevel'] = 'Light is dimmed to ' . $this->level . '%';
        }
    }

    public function getLevel() : int
    {
        return $this->level;
    }
}