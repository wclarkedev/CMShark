<?php
/* Additonal features - google recaptcha */
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
        <title>Log into CMShark</title>
        <meta name="title" content="Log into CMShark">
        <link rel="icon" type="image/x-icon" href="/uploads/cmsharklogoshark.png">
    </head>
    <body class="bg-backgroundColor">
<?php
    $router->get('/', function () {
        // https://www.okta.com/blog/2021/03/security-questions/
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Login</h2>
            <small class="text-primaryText text-center my-2">Required fields <b class="text-red-600">*</b></small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Username <b class="text-red-600">*</b></label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="e.g. jonny" name="account-setup-username">
                </section>
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Password <b class="text-red-600">*</b></label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="password" placeholder="**************" name="account-setup-password">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Login">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/"><i class="fa-solid fa-arrow-left"></i> Return to site</a></span> 
                </section>
            </form>
        </div>
        <?php
    });
    $router->run();
    ?>
    </body>