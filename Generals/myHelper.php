<?php
/**
 * Learn Design Patterns 
 * Файл содержаший набор функций, обеспечивающих функционирование приложения:
 *     автозагрузку;
 *
 * PHP version 7.0.1
 *
 * @category Learn
 *
 * @package Observer
 *
 * @author Anb05 <alexandr05@list.ru>
 *
 * @license MIT <mit@example.com>
 *
 * @link https://github.com/anb05/weather.git
 */

/**
 * Автозагрузчик классов
 *
 * @param string $class class namespace
 *
 * @return string path to file class
 */
function autoload($class)
{
    $dirName = explode("\\", $class);
    unset($dirName[0]);

    $path = realpath(
        __DIR__ . "/../" . DIRECTORY_SEPARATOR .
        implode(DIRECTORY_SEPARATOR, $dirName) .
        ".php"
    );

    if (is_file($path)) {
        include_once $path;
    }
    return false;
}

spl_autoload_register('autoload');

