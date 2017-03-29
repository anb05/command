<?php
/**
 * The file have a array with command for devices
 * The list of devices is in devices.php
 *
 * PHP version 7.1
 *
 * @category Learn
 *
 * @package Command\Generals
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license <GNU Public License>
 *
 * @link https://github.com/anb05/command.git
 */

$command = [
    'LightOnCommand'          => Command\Models\LightOnCommand::class,
    'LightOffCommand'         => Command\Models\LightOffCommand::class,
    'CeilingFanHighCommand'   => Command\Models\CeilingFanHighCommand::class,
    'CeilingFanMediumCommand' => Command\Models\CeilingFanMediumCommand::class,
    'CeilingFanLowCommand'    => Command\Models\CeilingFanLowCommand::class,
    'CeilingFanOffCommand'    => Command\Models\CeilingFanOffCommand::class,
    'GarageDoorUpCommand'     => Command\Models\GarageDoorUpCommand::class,
    'GarageDoorDownCommand'   => Command\Models\GarageDoorDownCommand::class,
    'StereoOnCommand'         => Command\Models\StereoOnCommand::class,
    'StereoOnWithCDCommand'   => Command\Models\StereoOnWithCDCommand::class,
    'StereoOffCommand'        => Command\Models\StereoOffCommand::class,
    'TVOnCommand'             => Command\Models\TVOnCommand::class,
    'TVOffCommand'            => Command\Models\TVOffCommand::class,
    'HottubOnCommand'         => Command\Models\HottubOnCommand::class,
    'HottubOffCommand'        => Command\Models\HottubOffCommand::class,
    'NoCommand'               => Command\Models\NoCommand::class,
];

return $command;
