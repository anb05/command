<?php
/**
 */

namespace Command\Models;


use Command\Contracts\Command;

class RemoteControl
{
    private $onCommands  = [];
    private $offCommands = [];

    public function __construct()
    {
        $noCommand = new NoCommand();
        for ($counter = 0; $counter < 7; $counter++) {
            $this->onCommands[] = $this->offCommands[] = $noCommand;
        }
    }

    public function setCommand($slot, Command $onCommand, Command $offCommand) : void
    {
        $this->onCommands[$slot]  = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function onButtonWasPushed($slot)
    {
        $this->onCommands[$slot]->execute();
    }

    public function offButtonWasPushed($slot)
    {
        $this->offCommands[$slot]->execute();
    }

    public function toString()
    {
        $string = "<br>\n------ Remote Control ------<br>\n";
        foreach ($this->onCommands as $key => $value) {
            $string .= '[slot ' . $key . '] ';
            $string .= get_class($this->onCommands[$key]);
            $string .= ' ' . get_class($this->offCommands[$key]);
            $string .= "<br>\n";
        }
        return $string;
    }
}