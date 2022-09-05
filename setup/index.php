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
    $router->get('/', function () {
        ?>
        <div class="flex flex-col mx-auto">
            <div class="flex flex-col mx-auto w-5/12 mt-12" id="welcome-container">
                <h1 class="text-primaryText text-center text-4xl font-semibold" >Welcome to CMShark</h1>
                <span class="text-primaryText my-5 text-lg">
                    CMShark is an open source, customisable and, whitelabel link list experience. We have put together a series of setup steps 
                    to help you get started easily without needing to edit configuration files. 
                </span>
                <a class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold" href="account/">Get Started</a>
            </div>
        </div>
        <?php
    });
    $router->get('account/', function () {
        // https://www.okta.com/blog/2021/03/security-questions/
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Account Setup</h2>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Username</label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm" type="text" placeholder="e.g. jonny" name="account-setup-username">
                </section>
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-1">Email</label>
                    <small class="italic text-secondaryText mb-2">* This must be a valid email that can recieve mail.</small>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm" type="text" placeholder="e.g. jonhstevens@cmshark.com" name="account-setup-email">
                </section>
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Password</label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm" type="password" placeholder="**************" name="account-setup-password">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-4 mb-6">
                    <label class="text-lg text-primaryText my-2">Confirm Password</label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm" type="password" placeholder="**************" name="account-setup-confirm-password">
                </section>
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Security Question</label>
                    <small class="italic text-secondaryText mb-2">* Using a security question is optional. It is recommended that you fill out a security question as a form of password recovery.</small>
                    <select class="" name="account-setup-security-question-choice-1">
                        <option selected hidden>Security Question</option>
                    </select>
                    <small class="italic text-secondaryText my-2">* Before choosing a security question, make sure that the answer is something that you will remember.</small>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm" placeholder="Answer to security question" type="text" name="account-setup-security-question-choice-1-answer">

                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Save & Continue">
                </section>
            </form>
        </div>
        <?php
    });

    $router->get('page/', function () {
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-3xl text-center font-semibold">Site Setup</h2>
            <form class="" method="POST">
                <section class="flex flex-col">
                    <label>Title</label>
                    <input class="" type="text" placeholder="" name="account-setup-username">
                </section>
                <section class="flex flex-col">
                    <label>Description</label>
                    <input class="" type="text" placeholder="" name="account-setup-email">
                </section>
                <section class="flex flex-col">
                    <label>Your Full Name</label>
                    <input class="" type="password" placeholder="" name="account-setup-password">
                </section>
                <section class="flex flex-col">
                    <label>Site Language</label>
                    
                </section>
            </form>
        </div>
        <?php
    });

    $router->post('/', function () {

    });

    $router->run();
?>
    </body>
</html>
