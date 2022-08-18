<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin | CMShark</title>
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
        <div class="bg-backgroundAccent rounded w-60 h-3/6 fixed top-2 left-2" id="navigation">
            <h1 class="text-primaryText text-center text-2xl font-semibold py-3">CMShark</h1>
            <div class="flex flex-col my-4 place-self-center">
                <a class="text-primaryText my-2 hover:ring hover:ring-accent ring ring-accent p-2 mx-3 rounded-sm" href="/admin"><i class="fa-solid fa-house mr-1"></i> Home</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/"><i class="fa-solid fa-gear mr-1"></i> Settings</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/user"><i class="fa-solid fa-user-gear mr-1"></i> User Settings</a>
            </div>
            <div class="flex flex-col my-4">
                <a class="" href="/logout.php">Logout</a>
            </div>
        </div>
        <div class="mt-12" id="edit-page">
            <h1 class="text-primaryText text-3xl text-center font-semibold">Edit Page</h1>
            <section class="flex flex-col mx-auto w-8/12" id="edit-page-form-container">
                
                <form action="POST" class="flex flex-col mt-2">
                    <div class="bg-backgroundAccent rounded w-6/12 flex flex-col mx-auto py-2 my-3">
                        <h2 class="text-2xl text-primaryText place-self-center my-2">Page Header</h2>
                        <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                            <label class="text-primaryText text-lg mb-1">Name</label>
                            <input class="bg-backgroundColor rounded p-2 text-primaryText placeholder:text-secondaryText" type="text" id="header-name-input" name="pageContentHeaderName" placeholder="John Doe">
                        </div>
                        <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                            <label class="text-primaryText text-lg mb-1">Bio</label>
                            <input class="bg-backgroundColor rounded p-2 text-primaryText placeholder:text-secondaryText" type="text" id="header-bio-input" name="pageContentHeaderBio" placeholder="I work as a security analyist.">
                        </div>
                        <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                            <label class="mb-1 text-primaryText text-lg">Profile Picture</label>
                            <label class="cursor-pointer w-12/12 bg-backgroundColor rounded p-2 text-primaryText text-secondaryText">
                                <i class="fa-solid fa-upload mr-2"></i>
                                Upload Image
                                <input type="file" class="hidden" value="Upload-Image" name="userProfilePicture"> 
                            </label>
                        </div>

                    </div>
                    <div class="bg-backgroundAccent rounded w-6/12 flex flex-col mx-auto py-2 my-3">
                        <h2 class="text-2xl text-primaryText place-self-center my-2">Social Icons</h2>
                        <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                            
                        </div>
                    </div>
                    <div class="bg-backgroundAccent rounded w-6/12 flex flex-col mx-auto py-2 my-3">
                        <h2 class="text-2xl text-primaryText place-self-center my-2">Links</h2>
                        <div class="flex flex-col mx-5 mb-5 place-self-center w-6/12">
                            
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
        <div class="bg-backgroundAccent rounded w-60 h-3/6 fixed top-2 left-2" id="navigation">
            <h1 class="text-primaryText text-center text-2xl font-semibold py-3">CMShark</h1>
            <div class="flex flex-col my-4 place-self-center">
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin"><i class="fa-solid fa-house mr-1"></i> Home</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent ring ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/"><i class="fa-solid fa-gear mr-1"></i> Settings</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/user"><i class="fa-solid fa-user-gear mr-1"></i> User Settings</a>
            </div>
            <div class="flex flex-col my-4">
                <a class="" href="/logout.php">Logout</a>
            </div>
        </div>
        <div class="mt-12">
            <h1 class="text-primaryText text-3xl text-center">Settings</h1>
        </div>
        <?php
    });

    // User settings page
    $router->get('/settings/user',function () {
        ?>
        <div class="bg-backgroundAccent rounded w-60 h-3/6 fixed top-2 left-2" id="navigation">
            <h1 class="text-primaryText text-center text-2xl font-semibold py-3">CMShark</h1>
            <div class="flex flex-col my-4 place-self-center">
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin"><i class="fa-solid fa-house mr-1"></i> Home</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/"><i class="fa-solid fa-gear mr-1"></i> Settings</a>
                <a class="text-primaryText my-2 hover:ring hover:ring-accent ring ring-accent p-2 mx-3 rounded-sm" href="/admin/settings/user"><i class="fa-solid fa-user-gear mr-1"></i> User Settings</a>
            </div>
            <div class="flex flex-col my-4">
                <a class="" href="/logout.php">Logout</a>
            </div>
        </div>
        <div class="mt-12">
            <h1 class="text-primaryText text-3xl text-center">User Settings</h1>
        </div>
        <?php
    });

    $router->run();
?>
    </body>
</html>
