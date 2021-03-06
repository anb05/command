<?php
/**
 */

namespace Command\Models;


use Command\Contracts\Command;

class LightOffCommand implements Command
{
    private $light;
    private $level;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
//        $this->level = $this->light->getLevel();
        $this->light->off();
    }

    public function undo(): void
    {
        $this->light->on();
//        $this->light->dim($this->level);
    }
}