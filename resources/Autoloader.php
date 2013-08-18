<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Exiri
 * Date: 14.08.13
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */


namespace Autoload;

class Autoloader {

    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className) {
        echo 'Trying to load ', $className, ' via ', __METHOD__, "()\n";
        include $className . '.php';
    }

}

$autoloader = new Autoloader();
?>