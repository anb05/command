<?php
/**
 */

namespace Command\Models;

use Command\Contracts\Command;

class HottubOnCommand implements Command
{
    private $hottub;

    public function __construct(Hottab $hottab)
    {
        $this->hottub = $hottab;
    }

    public function execute(): void
    {
        $this->hottub->on();
        $this->hottub->setTemperature(104);
        $this->hottub->circulate();
    }

    public function undo(): void
    {
        $this->hottub->off();
    }
}