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

if (!empty($_SESSION['remember'])) {
    $loader = unserialize($_SESSION['remember']);
    $loader->run();
} else {
    $loader = new \Command\Controllers\RemoteLoader();
    $loader->run();
}
$_SESSION['remember'] = serialize($loader);
//echo "<br>SESSION<br>\n";
//var_dump($_SESSION);


