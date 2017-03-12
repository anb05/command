<?php
/**
 * The file have a class with config
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

$devices = [
    'Light'  => Command\Models\Light::class,
    'Stereo' => Command\Models\Stereo::class,
    'TV'     => Command\Models\TV::class,
];

return $devices;