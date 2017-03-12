<?php
/**
 */

namespace Command\Models;

use Command\Contracts\Command;

class NoCommand implements Command
{
    public function execute(): void
    {
    }

    public function undo(): void
    {
    }
}