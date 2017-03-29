<?php
/**
 * The file have a class with main logic application
 *
 * PHP version 7.1
 *
 * @category Learn
 *
 * @package Command\Controllers
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license <GNU Public License>
 *
 * @link https://github.com/anb05/command.git
 */

namespace Command\Controllers;

use Command\Models\RemoteControl;

/*
use Command\Models\CeilingFanHighCommand;
use Command\Models\CeilingFanOffCommand;
use Command\Models\GarageDoorDownCommand;
use Command\Models\GarageDoorUpCommand;
use Command\Models\LightOffCommand;
use Command\Models\LightOnCommand;
use Command\Models\StereoOffCommand;
use Command\Models\StereoOnCommand;
//use Command\Models\StereoOnWithCDCommand;
use Command\Models\TVOffCommand;
use Command\Models\TVOnCommand;
*/

/**
 * Class RemoteLoader
 *
 * @category Controllers
 *
 * @package Command\Controllers
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license <GNU Public License>
 *
 * @link https://github.com/anb05/command.git
 */
class RemoteLoader
{
    private $aliases;
    private $devicesPlaces;
    private $devicesCommands;
    private $commands;
    private $devices = [];

    private $remoteControl;

    private $onCommand  = [];
    private $offCommand = [];

    public function __construct()
    {
        $this->aliases         = require_once (__DIR__ . "/../Generals/devices.php");
        $this->devicesPlaces   = require_once (__DIR__ . "/../Generals/devicesInPlace.php");
        $this->devicesCommands = require_once (__DIR__ . "/../Generals/devicesCommand.php");
        $this->commands        = require_once (__DIR__ . "/../Generals/commands.php");

        $this->remoteControl = new RemoteControl();

        $this->init();

    }

    public function run()
    {
//        $this->onCommand['Living Room Light']  = new LightOnCommand($this->devices['Living Room Light']);
//        $this->offCommand['Living Room Light'] =  new LightOffCommand($this->devices['Living Room Light']);
//
//        $this->onCommand['Kitchen Light']      = new LightOnCommand($this->devices['Kitchen Light']);
//        $this->offCommand['Kitchen Light']     =  new LightOffCommand($this->devices['Kitchen Light']);
//
//        $this->onCommand['Living Room CeilingFan']  = new CeilingFanHighCommand($this->devices['Living Room CeilingFan']);
//        $this->offCommand['Living Room CeilingFan'] = new CeilingFanOffCommand($this->devices['Living Room CeilingFan']);
//
//        $this->onCommand['GarageDoor']  = new GarageDoorUpCommand($this->devices['GarageDoor']);
//        $this->offCommand['GarageDoor'] = new GarageDoorDownCommand($this->devices['GarageDoor']);
//
//        $this->onCommand['Living Room Stereo']  = new StereoOnCommand($this->devices['Living Room Stereo']);
//        $this->offCommand['Living Room Stereo'] = new StereoOffCommand($this->devices['Living Room Stereo']);
//
//        $this->onCommand['Living Room TV']  = new TVOnCommand($this->devices['Living Room TV']);
//        $this->offCommand['Living Room TV'] = new TVOffCommand($this->devices['Living Room TV']);

        foreach ($_SESSION['power'] as $key => $value) {
            $this->remoteControl->setCommand($key, $this->onCommand[$key], $this->offCommand[$key]);
        }
                if (!empty($_GET)) {
                    $this->checkButton($_GET);
                }

        require_once __DIR__ . "/../public/views/index.html";
//        echo "<br>SESSION<br>";
//        var_dump($_SESSION);
//        echo "<br>GET<br>";
//        var_dump($_GET);

//        echo "<br>RemoteLoader:<br>";
//        var_dump($this);
//        die();
    }

    private function init()
    {
        foreach ($this->devicesPlaces as $device => $place) {
            foreach ($place as $item) {
                $name = trim($item . " " . $device);
                $this->devices[$name] = new $this->aliases[$device]($item);
            }
        }

        foreach ($this->devicesCommands as $device => $command) {
            $deviceExplode = explode(' ', $device);
            foreach ($this->devicesPlaces[$deviceExplode[0]] as $place) {
                $devName = trim($place . " " . $deviceExplode[0]);
                $name = trim($place . " " . $deviceExplode[0] . " " . $command[0]);

                if (empty($_SESSION['power'][$name])) {
                    $_SESSION['power'][$name] = 0;
                    $_SESSION['message'][$name] = "";
                }

                foreach ($command as $key =>$value) {
                    if ($key%2 === 0) {
                        $this->onCommand[$name] = new $this->commands[$deviceExplode[0] . $value . 'Command']($this->devices[$devName]);
                    }elseif($key%2 !== 0) {
                        $this->offCommand[$name] = new $this->commands[$deviceExplode[0] . $value . 'Command']($this->devices[$devName]);
                    }
                }
            }
        }

        /*
        foreach ($this->devicesPlaces as $device => $place) {
            foreach ($place as $item) {
                $name = trim($item . " " . $device);
                $this->devices[$name] = new $this->aliases[$device]($item);

                foreach ($this->devicesCommands[$device] as $devKey => $devVal) {
                    if ($devKey%2 === 0) {
                        $this->onCommand[$name] = new $this->commands[$device . $devVal . "Command"]($this->devices[$name]);
                    } elseif ($devKey%2 !== 0) {
                        $this->offCommand[$name] = new $this->commands[$device . $devVal . "Command"]($this->devices[$name]);
                    }
                }

                if (empty($_SESSION['power'][$name])) {
                    $_SESSION['power'][$name] = 0;
                    $_SESSION['message'][$name] = "";
                }
            }
        }
        */
    }

    private function checkButton($array)
    {
        if (isset($array['line']) && $array['line'] !== 'undo') {
            if(isset($array['col'])) {
                if ((int)$array['col'] === 2 && isset($_SESSION['power'][$array['line']])) {
                    $this->remoteControl->offButtonWasPushed($array['line']);
                } elseif ((int)$array['col'] === 1 && isset($_SESSION['power'][$array['line']])) {
                    $this->remoteControl->onButtonWasPushed($array['line']);
                }
            }
        } elseif (isset($array['line']) && $array['line'] === 'undo') {
            $this->remoteControl->undoButtonWasPushed();
        }
    }
}
