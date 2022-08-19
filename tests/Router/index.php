<?php

    // In case one is using PHP 5.4"s built-in server
    $filename = __DIR__ . preg_replace("#(\?.*)$#", "", $_SERVER["REQUEST_URI"]);
    if(php_sapi_name() === "cli-server" && is_file($filename)) {
        return false;
    }

    require_once __DIR__ . "/vendor/autoload.php";

    // Create a Router
    $router = new \Bramus\Router\Router();

    // Custom 404 Handler
    $router->set404(function () {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        echo "404, route not found!";
    });

    $router->get("/", function () {
        echo "<h1 style="color:pink;">hello</h1>";
    });
    // Admin router model test
    $router->get("/admin",function(){
        echo "<h1>Admin</h1>";
    });
    $router->get("/admin/links",function(){
        echo "<h1>Links admin</h1>";
        ?>
        <span>Links are cool</span>
        <?php
    });
    $router->get("/admin/settings",function(){
        echo "<h4>Settings</h4>";
    });

    $router->run();