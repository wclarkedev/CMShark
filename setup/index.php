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
    <body class="">
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
        <section class="" id="setup-welcome"></section>
        <section class="" id="setup-basic-info-form">
            <form method="POST" class="flex flex-col">
                <div class="flex flex-col">
                    <label class="">Page Title - A title for your page </label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Page Description - A short description about your page </label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Name - Your first and last name, separated with a space </label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Language - The language the content of this site will be written in </label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <!-- Diff input <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">-->
                </div>
            </form>
        </section>
        <section class="" id="setup-nextpage"></section>
    <?php

});
$router->get('/account', function (){ 

});
$router->get('/page', function () {

});
$router->get('/complete', function () {

});
$router->get('/repair', function () {

});
$router->get('/repair/recreate', function () {

});

$router->post('/', function () {

});
$router->post('/account', function () {

});
$router->post('/page', function () {

});
$router->run();
?>
    </body>
</html>