<?php
/**
 */

namespace Command\Models;


use Command\Contracts\Command;

class TVOffCommand implements Command
{
    private $tv;

    public function __construct(TV $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): void
    {
        $this->tv->off();
    }

    public function undo(): void
    {
        // TODO: Implement undo() method.
    }
}