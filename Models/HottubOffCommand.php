<?php
/**
 */

namespace Command\Models;

use Command\Contracts\Command;

class HottubOffCommand implements Command
{
    private $hottub;

    public function __construct(Hottab $hottab)
    {
        $this->hottub = $hottab;
    }

    public function execute(): void
    {
        $this->hottub->setTemperature(98);
        $this->hottub->off();
    }

    public function undo(): void
    {
        $this->hottub->on();
    }
}