<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';
    require 'audit-logging.php';
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
            <main class="mx-auto mt-6 w-10/12">
                <div class="flex flex-col">
                    <h1 class="text-primaryText text-3xl font-semibold text-center">Edit Page</h1>
                    <form method="POST" class="flex flex-col mx-auto">
                        <div class="flex-col flex mt-8 w-[350px]">
                            <h2 class="text-primaryText underline text-xl text-center">Page header</h2>
                            <section class="flex flex-col my-2">
                                <label class="text-lg text-primaryText my-2">Name</label>
                                <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="Your name" name="account-setup-confirm-password">
                            </section>
                            <section class="flex flex-col my-2">
                                <label class="text-lg text-primaryText my-2">Bio</label>
                                <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="Short description of yourself" name="account-setup-confirm-password">
                            </section>
                            <section class="flex flex-col my-2">
                                <label class="text-lg text-primaryText my-2">Location</label>
                                <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="The country or city you are from" name="account-setup-confirm-password">
                            </section>
                            <section class="flex flex-col my-2">
                                <label class="text-lg text-primaryText my-2">Profile picture</label>
                                <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="password" placeholder="**************" name="account-setup-confirm-password">
                            </section>
                        </div>
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
            <main class="mx-auto mt-6 w-10/12">
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
            <main class="mx-auto mt-6 w-10/12">
                <h1 class="text-primaryText text-3xl font-semibold text-center">Edit Page</h1>
                <div class="bg-backgroundAccent rounded w-4/12">
                    <h1>HI</h1>
                </div>
            </main>            
        </div>
        <?php
    });
    $router->get('/logs', function () {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"logs"));?>
            <main class="mx-auto mt-6 w-10/12">
                <?php echo $blade->run("logging", array("logs"=>get_audit_logs()));?>
            </main>            
        </div>
        <?php

    });
    /* $router->get('/logs/(\d+)', function ($page_num) {
        global $blade;
        ?>
        <div class="flex">
            <?php echo $blade->run("nav", array("page"=>"logs"));?>
            <main class="mx-auto mt-6 w-10/12">
                <?php echo $blade->run("logging", array("logs"=>get_audit_logs(), "page_num"=>$page_num));
                
                echo "<h1 class=\"text-primaryText\">".htmlentities($page_num)."</h1>";?>
            </main>            
        </div>
        <?php
    }); */

    $router->run();
?>
    </body>
</html>
