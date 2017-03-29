<?php
/**
 */

namespace Command\Models;


use Command\Contracts\Command;

class LightOnCommand implements Command
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
        $this->light->on();
    }

    public function undo(): void
    {
        $this->light->off();
//        $this->light->dim($this->level);
    }
}