<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';

    //? Create a Router
    $router = new \Bramus\Router\Router();
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Setup CMShark</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor">
<?php
    $router->get('/',function () {
        ?>
        <div class="" id="welcome-container">
            <h1>Welcome to CMShark</h1>
            <span>
                CMShark is an open source, customisable and, whitelabel link list experience. We have put together a series of setup steps 
                to help you get started easily without needing to edit configuration files. 
            </span>
            <a href="account/" class="">Get Started</a>
        </div>
        <?php
    });

    $router->get('/account',function () {
        ?>
        <div class="" id="account-welcome-container">
            <h1>CMShark Account setup</h1>
            <!--
                Security questions
                Email
                Password
                Username
            -->
        </div>
        <?php
    });

    $router->get('/page',function () {
        ?>
        <div class="" id="page-welcome-container">
            <h1>CMShark Page setup</h1>
            <!--
                Meta 
                Page theme (layout)
            -->
        </div>
        <?php
    });

    $router->post('/account',function () {

    });

    $router->post('/page',function () {

    });

    $router->run();
?>
    </body>
</html>
