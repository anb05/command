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
    private $devices = [];

    public function __construct()
    {
        $this->init();
    }

    public function run()
    {
    }

    private function init()
    {
        $this->aliases       = require_once(__DIR__ . "/../Generals/devices.php");
        $this->devicesPlaces = require_once(__DIR__ . "/../Generals/devicesInPlace.php");

        foreach ($this->devicesPlaces as $device => $place) {
            foreach ($place as $item) {
                $name = trim($device . " " . $item);
                $deviceName = trim(strtolower($device) . str_replace(' ', '', $item));
                $deviceName = new $this->aliases[$device]($item);
                $this->devices[] = $deviceName;

                if (empty($_SESSION['power'][$name])) {
                    $_SESSION['power'][$name] = 0;
                    $_SESSION['message'][$name] = "";
                }
            }
        }
    }
}
