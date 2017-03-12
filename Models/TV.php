<?php
/**
 */

namespace Command\Models;


class TV
{
    private $location;
    private $channel = 0;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function on() : void
    {
        $_SESSION['TVPower'] = 1;
        $_SESSION['TVLocation'] = $this->location . " TV is on";
    }

    public function off() : void
    {
        $_SESSION['TVPower'] = 0;
        $_SESSION['TVLocation'] = $this->location . " TV is off";
    }

    public function setInputChannel(int $chanel=3) : void
    {
        $this->channel = $chanel;
        $_SESSION['TVChannel'] = $this->location . " TV channel is set for DVD";
    }
}