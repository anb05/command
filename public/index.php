<?php
/**
 * The file is a Front Controller
 *
 * PHP version 7.1
 *
 * @category Learn
 *
 * @package Factory
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license <GNU Public License>
 *
 * @link https://github.com/anb05/pizza_factory.git
 */

session_start();

require_once __DIR__ . "/../Generals/myHelper.php";

$loader = new \Command\Controllers\RemoteLoader();
$loader->run();

require_once __DIR__ . "/views/index.html";

/*
$remote = new \Command\Models\RemoteControl();
echo "<br> test RemoteControl <br>";
var_dump($remote);

echo "<br>" . $remote->toString();

$stereo = new \Command\Models\Stereo("living room");

$stereo->setVolume(1);

$stereo->setCD();

$stereo->on();

*/

echo "<br> SESSION<br>";
var_dump($_SESSION);

echo "<br>GET<br>";
var_dump($_GET);

echo "<br>LOAD<br>";
var_dump($loader);
