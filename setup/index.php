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
// TODO Make UI and theme implementation 
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
        <section class="" id="setup-welcome">
            <div class="flex flex-col">
                <div class="flex mx-auto flex-col">
                    <h1>Welcome to CMShark</h1>
                    <span>
                        This setup process will help you get started with CMShark. From creating your administrator account to choosing which layout and theme you would like to use,
                        this setup process will allow you to configure and setup it all easily.
                    </span>
                    <small class="font-semibold">
                        If you are having issues with this setup process, please 
                        <a class="text-blue-500 hover:underline" 
                        href="https://github.com/wclarkey/CMShark/issues/new?labels=bug&title=Setup+Process+Bug+Report&body=Describe+the+problem:" 
                        target="_blank">
                            report the bug
                        </a>.
                    </small>
                </div>
                <div class="flex mx-auto flex-col">
                    <h2 class="font-semibold text-center">Need some additional help?</h2>
                    <span class="text-center">Check out these resources designed to help you.</span>
                    <ul class="flex flex-row">
                        <li><a class="text-blue-500 hover:underline" href="https://docs.cmshark.com">Documentation</a></li>
                        <li><a class="text-blue-500 hover:underline" href="https://discord.gg/FMmJnz6rmD">Community Discord Server</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="" id="setup-page-header"></section>
        <section class="" id="setup-basic-info-form">
            <form method="POST" class="flex flex-col">
                <div class="">
                    <label></label>
                </div>
            </form>
        </section>
        <section class="" id="setup-nextpage"></section>
    <?php
});
$router->post('/', function () {

});

$router->get('/account', function (){ 
    ?>
        <section class="" id="setup-page-header"></section>
        <section class="" id="setup-basic-info-form">
            <form method="POST" class="flex flex-col">
                <div class="flex flex-col">
                    <label class="">Username</label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Email</label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Password</label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
                <div class="flex flex-col">
                    <label class="">Confirm Password</label>
                    <!--<small><sup>*</sup> This can be changed at a later date in settings. </small>-->
                    <input class="w-1/12 border-2 border-gray-500" type="text" name="" placeholder="">
                </div>
            </form>
        </section>
        <section class="" id="setup-nextpage"><a href="">Next Page</a></section>
    <?php
});
$router->post('/account', function () {

});
$router->get('/account/success', function (){

});

$router->get('/page', function () {

});
$router->post('/page', function () {

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