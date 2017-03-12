<?php
/**
 */

namespace Command\Models;


use Command\Contracts\Command;

class StereoOnCommand implements Command
{
    private $stereo;

    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    public function execute(): void
    {
        $this->stereo->on();
    }

    public function undo(): void
    {
    }
}