<?php
/*
* This file is part of the Smarty PHPUnit tests.
*
*/
/*
 * Smarty PHPUnit Bootstrap
 */
include_once dirname(__FILE__) . '/Config.php';
if (!class_exists('Smarty_Autoloader')) {
    if (is_file(dirname(__DIR__) . '/smarty/libs/bootstrap.php')) {
        require_once dirname(__DIR__) . '/smarty/libs/bootstrap.php';
    } elseif (is_file(dirname(__DIR__) . '/libs/bootstrap.php')) {
        require_once dirname(__DIR__) . '/libs/bootstrap.php';
    } else {
        throw new Exception('can not locate Smarty distribution');
    }
}

if (!defined('SMARTY_COMPOSER_INSTALL')) {
    foreach (array(dirname(dirname(__DIR__)) . '/autoload.php', dirname(__DIR__) . '/vendor/autoload.php',
                   dirname(__FILE__) . '/vendor/autoload.php') as $file) {
        if (file_exists($file)) {
            define('SMARTY_COMPOSER_INSTALL', $file);
            break;
        }
    }
    unset($file);
}
if (!class_exists('PHPUnit_Framework_TestCase') && !class_exists('\PHPUnit\Framework\TestCase')){
    require_once SMARTY_COMPOSER_INSTALL;
}

if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase')) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
    class_alias('\PHPUnit\Framework\Error\Notice', '\PHPUnit_Framework_Error_Notice');
    class_alias('\PHPUnit\Framework\Error\Error', '\PHPUnit_Framework_Error_Error');
    class_alias('\PHPUnit\Framework\Error\Warning', '\PHPUnit_Framework_Error_Warning');
    class_alias('\PHPUnit\Framework\Error\Warning', '\PHPUnit_Framework_Error_Deprecated');
    class_alias('\PHPUnit\Util\Configuration', '\PHPUnit_Util_Configuration');
}

require_once __DIR__ . '/PHPUnit_Smarty.php';
if (!ini_get('date.timezone')) {
    ini_set('date.timezone', 'Europe/Berlin');
}
