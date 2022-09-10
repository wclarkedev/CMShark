<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';
    use eftec\bladeone\BladeOne;
    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';
    $blade = new BladeOne ( $views , $cache , BladeOne::MODE_AUTO); 

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
        <title>CMShark Admin</title>
        <meta name="title" content="CMShark Admin">
        <link rel="icon" type="image/x-icon" href="/uploads/cmsharklogoshark.png">
        <script src="views/script.js"></script>
    </head>
    <body class="bg-backgroundColor w-full h-full">
<?php
    $router->get('/',function () {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"home"));?>
            <main class="p-4">
                <h1 class="text-4xl text-gray-400">Welcome {{user}}</h1>
            </main>            
        </div>
        <?php
    });
    $router->match('GET|POST', '/page/edit', function () {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"edit-page"));?>
            <main class="p-4">
                <div class="flex flex-col">
                    <form method="POST" class="flex flex-col mx-auto">
                        <h1>helsl</h1>
                    </form>
                </div>
            </main>            
        </div>
        <?php
    });
    $router->match('GET|POST', '/page/settings', function () {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"page-settings"));?>
            <main class="p-4">
                <h1 class="text-4xl text-gray-400">Welcome {{user}}</h1>
            </main>            
        </div>
        <?php
    });
    $router->match('GET|POST', '/account', function () {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"account"));?>
            <main class="p-4">
                <h1 class="text-4xl text-gray-400">Hi {{user}}</h1>
            </main>            
        </div>
        <?php
    });

    $router->run();
?>
    </body>
</html>
