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
            <div class="mt-12" id="edit-page">
                <h1 class="text-primaryText text-3xl text-center font-semibold">Edit Page</h1>
                <section class="flex flex-col mx-auto w-8/12" id="edit-page-form-container">
                    
                    <form action="POST" class="flex flex-col mt-5">
                        <div class="bg-backgroundAccent rounded w-6/12 flex flex-col mx-auto">
                            <h2 class="text-2xl text-primaryText place-self-center my-2">Page Header</h2>
                            <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                                <label class="text-primaryText text-lg mb-1">Name</label>
                                <input class="bg-backgroundColor rounded p-2 text-primaryText placeholder:text-secondaryText" type="text" id="header-name-input" name="pageContentHeaderName" placeholder="John Doe">
                            </div>
                            <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                                <label class="text-primaryText text-lg mb-1">Bio</label>
                                <input class="bg-backgroundColor rounded p-2 text-primaryText placeholder:text-secondaryText" type="text" id="header-bio-input" name="pageContentHeaderBio" placeholder="I work as a security analyist.">
                            </div>
                        </div>
                    </form>
                </section>
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
    </body>
</html>