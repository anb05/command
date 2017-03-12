<?php
/**
 */

namespace Command\Contracts;


interface Command
{
    public function execute(): void;

    public function undo(): void;
}