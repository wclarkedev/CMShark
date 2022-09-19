<?php
/* Additonal features - google recaptcha */
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';
    require '../functions.php';
    ob_start();
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
    session_start();
    $router->match('GET|POST','/', function () {
        // TODO - Implement 2fa
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) header('/admin');
        $oskk = json_decode(file_get_contents('../json/config.json'));
        $oskk = $oskk->{'key'};
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Login</h2>
            <small class="text-primaryText text-center my-2">Required fields <b class="text-red-600">*</b></small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Username <b class="text-red-600">*</b></label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="e.g. jonny" name="login-username">
                </section>
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Password <b class="text-red-600">*</b></label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="password" placeholder="**************" name="login-password">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Login">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/"><i class="fa-solid fa-arrow-left"></i> Return to site</a></span> 
                    <span class=" text-center text-accent hover:underline my-6"><a href="forgot-password/">Forgot password?</a></span> 
                </section>
            </form>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            if (empty(trim($_POST['login-username']))) {
                echo '<span style="color:red;">One or more required fields are empty</span>';
                exit();
            }
            $username = $_POST['login-username'];
            if (empty(trim($_POST['login-password']))) {
                echo '<span style="color:red;">One or more required fields are empty</span>';
                exit();
            }
            $password = $_POST['login-password'];
            
            $username = filter_var($username, FILTER_SANITIZE_STRING);
            
            $cipher = 'AES-128-CTR';
            $iv_length = openssl_cipher_iv_length($cipher);
            $options = 0;
            $iv = '1234567891011121';

            $jsondata = file_get_contents('../json/account.json');
            $jsondata = json_decode($jsondata);
            $epw = $jsondata->{'password'};
            $un = $jsondata->{'username'};

            $depw = openssl_decrypt($epw, $cipher, $oskk, $options, $iv);

            if ($un != $username) {
                echo '<span style="color:red;">Incorrect Credentials</span>';
                exit();
            }
            if ($depw != $password) {
                echo '<span style="color:red;">Incorrect Credentials</span>';
                exit();
            }
            $_SESSION['loggedin'] = true;
            header("Location: /admin/");
        }
    });
    // TODO - Backend logic for pw recovery 

    $router->match('GET|POST', 'forgot-password/', function () {
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Password reset</h2>
            <small class="text-primaryText text-center my-2">Enter the account email or username</small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">Account Email or Username</label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="example@cmshark.com" name="reset-password-username-or-pw">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Continue">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/login"><i class="fa-solid fa-arrow-left"></i> Return to login</a></span> 
                </section>
            </form>
        </div>
        <?php
    });
    $router->match('GET|POST', 'forgot-password/options/', function () {
        if (!isset($_SESSION['step1']) && !$_SESSION['step1']) header("Location: /login/forgot-password/");
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Password reset</h2>
            <small class="text-primaryText text-center my-2">Choose a method of account verification</small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <select class="cursor-pointer bg-backgroundAccent py-2 px-3 text-secondaryText rounded-sm" name="account-setup-security-question">
                        <option selected hidden>Verification Method</option>
                        <option value="sq">Security Question</option>
                        <option value="2fa">Two Factor Authentication</option>
                    </select>
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Continue">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/login"><i class="fa-solid fa-arrow-left"></i> Return to login</a></span> 
                </section>
            </form>
        </div>
        <?php
    });
    $router->match('GET|POST', 'forgot-password/verify/security-question/', function () {
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Password reset</h2>
            <small class="text-primaryText text-center my-2">Answer your security question</small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm my-2" disabled value="<?php echo "Security question";?>">
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText my-2" type="text" placeholder="Answer" name="reset-password-username-or-pw">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Continue">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/login"><i class="fa-solid fa-arrow-left"></i> Return to login</a></span> 
                </section>
            </form>
        </div>
        <?php
    });
    $router->match('GET|POST', 'forgot-password/verify/2fa/', function () {
        ?>
        <div class="flex flex-col mx-auto w-5/12 mt-12">
            <h2 class="text-primaryText text-4xl text-center font-semibold">Password reset</h2>
            <small class="text-primaryText text-center my-2">Answer your security question</small>
            <form class="" method="POST">
                <section class="flex flex-col w-6/12 mx-auto my-4">
                    <label class="text-lg text-primaryText my-2">OTP / 2FA Verification Code</label>
                    <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" maxlength="6" name="reset-password-username-or-pw">
                </section>
                <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                    <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Continue">
                    <span class=" text-center text-accent hover:underline my-10"><a href="/login"><i class="fa-solid fa-arrow-left"></i> Return to login</a></span> 
                </section>
            </form>
        </div>
        <?php
    });

    $router->match('GET|POST', 'forgot-password/new-password/', function () {
        // TODO - Create form for new password 
    });
    $router->run();
?>
</body>