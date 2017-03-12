<?php
/**
 */

namespace Command\Models;


class Stereo
{
    private $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function on() : void
    {
        $_SESSION['stereoPower'] = 1;
        $_SESSION['stereoLocation'] = $this->location . " stereo is on";
    }

    public function off() : void
    {
        $_SESSION['stereoPower'] = 0;
        $_SESSION['stereoLocation'] = $this->location . " stereo is off";
    }

    public function setCD() : void
    {
        $_SESSION['stereoCD'] = $this->location . " stereo is set for CD input";
    }

    public function setDVD() : void
    {
        $_SESSION['stereoDVD'] = $this->location . " stereo is set for DVD input";
    }

    public function setRadio() : void
    {
        $_SESSION['stereoRadio'] = $this->location . " stereo is set for Radio";
    }

    public function setVolume(int $volume) : void
    {
        // code to set the volume
        // valid range: 1-11 (after all 11 is better than 10, right?)

        $_SESSION['stereoVolume']  = $this->location . " Stereo volume set to ";
        $_SESSION['stereoVolume'] .= $volume;
    }
}