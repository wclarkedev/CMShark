<?php
require_once('vendor/autoload.php');
use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.

//? Blade will allow use of multiple themes/ layout options
if (!true) {
    echo $blade->run("template",array("variable1"=>"value1")); // it calls /views/hello.blade.php
} else {
    echo $blade->run("template2",array("variable2"=>"value2")); // it calls /views/hello.blade.php
}