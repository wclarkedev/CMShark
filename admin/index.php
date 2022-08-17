<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor">
</html>
<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';

    // Create a Router
    $router = new \Bramus\Router\Router();
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });


    // Admin home page
    $router->get('/',function () {
        ?>
            <div class="mt-12">
                <h1 class="text-primaryText text-3xl text-center">Edit Page</h1>
            </div>
        <?php
    });

    // Admin settings page
    $router->get('/settings',function () {
        ?>
        <div class="mt-12">
            <h1 class="text-primaryText text-3xl text-center">Settings</h1>
        </div>
    <?php
    });

    $router->run();
?>