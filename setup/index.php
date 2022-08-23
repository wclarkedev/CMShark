<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Setup CMShark</title>
        <meta name="title" content="Setup CMShark">
    </head>
    <body class="bg-backgroundColor">
<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});
$router->get('/', function () {
    ?>
    <section class="flex flex-col mx-auto bg-backgroundAccent rounded-md w-7/12" id="setup-welcome">
        <h1 class="text-3xl text-primaryText text-center my-5" >CMShark Setup</h1>
        <span class="text-lg text-primaryText">Welcome to the CMShark setup process. This process is designed to help you setup CMShark site configuration without the hasstle of editing complex configuration files or code.</span>
    </section>
    <?php

});
$router->get('/1', function (){ 

});
$router->get('/2', function () {

});
$router->get('/complete', function () {

});
$router->get('/repair', function () {

});
$router->get('/repair/recreate', function () {

});
$router->run();
?>
    </body>
</html>