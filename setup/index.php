<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }
    error_reporting(0);
    require '../vendor/autoload.php';
    require '../functions.php';
    require '../admin/audit-logging.php';
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
        <title>Setup CMShark</title>
        <meta name="title" content="Setup CMShark">
        <link rel="icon" type="image/x-icon" href="/uploads/cmsharklogoshark.png">
    </head>
    <body class="bg-backgroundColor">
<?php
    $setup_file = '../json/config.json';
    $setup = json_decode(file_get_contents('../json/config.json'));
    $setup = $setup->{'setup'}->{'setup-complete'};
    $router->get('/', function () {
        global $setup; 
        //var_dump($setup);
        if (!$setup) {
            $json = file_get_contents('../json/config.json');
            $string = generateRandomString(20);
            $json = json_decode($json);
            $json->{'key'} = $string;
            $output = json_encode($json);
            file_put_contents('../json/config.json', $output);
            set_audit_log('Initiate CMShark setup.', 'System');
            ?>
            <div class="flex flex-col mx-auto">
                <div class="flex flex-col mx-auto w-5/12 mt-12" id="welcome-container">
                    <h1 class="text-primaryText text-center text-4xl font-semibold" >Welcome to CMShark</h1>
                    <span class="text-primaryText my-5 text-lg">
                        CMShark is an open source, customisable and, whitelabel link list experience. We have put together a series of setup steps 
                        to help you get started easily without needing to edit configuration files. 
                    </span>
                    <a class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold" href="/setup/account/">Get Started</a>
                </div>
            </div>
            <?php
        } else {
            header("Location: /");
        }
        
    });
    $router->match('GET|POST','account/', function () {
        global $setup; 
        if (!$setup) {
            ?>
            <div class="flex flex-col mx-auto w-5/12 mt-12">
                <h2 class="text-primaryText text-4xl text-center font-semibold">Account Setup</h2>
                <small class="text-primaryText text-center my-2">Required fields <b class="text-red-600">*</b></small>
                <form method="POST">
                    <section class="flex flex-col w-6/12 mx-auto my-4">
                        <label class="text-lg text-primaryText my-2">Username <b class="text-red-600">*</b></label>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="e.g. jonny" name="account-setup-username">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto my-4">
                        <label class="text-lg text-primaryText my-1">Email <b class="text-red-600">*</b></label>
                        <small class="italic text-accent mb-2">* This must be a valid email that can recieve mail.</small>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="text" placeholder="e.g. jonhstevens@cmshark.com" name="account-setup-email">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto my-4">
                        <label class="text-lg text-primaryText my-2">Password <b class="text-red-600">*</b></label>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="password" placeholder="**************" name="account-setup-password">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto mt-4 mb-6">
                        <label class="text-lg text-primaryText my-2">Confirm Password <b class="text-red-600">*</b></label>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" type="password" placeholder="**************" name="account-setup-confirm-password">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto my-4">
                        <label class="text-lg text-primaryText my-2">Security Question</label>
                        <small class="italic text-accent mb-3">* Using a security question is optional. It is recommended that you fill out a security question as a form of password recovery.</small>
                        <select class="cursor-pointer bg-backgroundAccent py-2 px-3 text-secondaryText rounded-sm" name="account-setup-security-question">
                            <option selected hidden>Security Question</option>
                            <option value="What city were you born in?">What city were you born in?</option>
                            <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
                            <option value="What was the first concert you attended?">What was the first concert you attended?</option>
                        </select>
                        <small class="italic text-accent my-3">* Before choosing a security question, make sure that the answer is something that you will remember.</small>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText" placeholder="Answer to security question" type="text" name="account-setup-security-question-answer">
    
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                        <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Save & Continue">
                    </section>
                </form>
            </div>
            <?php
            $oskk = json_decode(file_get_contents('../json/config.json'));
            $oskk = $oskk->{'key'};
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty(trim($_POST['account-setup-username']))) {
                    echo '<span style="color:red;">1Error</span>';
                    exit();
                }
                $username = $_POST['account-setup-username'];
                if (empty(trim($_POST['account-setup-email']))) {
                    echo '<span style="color:red;">2Error</span>';
                    exit();
                }
                $email = $_POST['account-setup-email'];
                if (empty(trim($_POST['account-setup-password']))) {
                    echo '<span style="color:red;">3Error</span>';
                    exit();
                }
                $password = $_POST['account-setup-password'];
                if (empty(trim($_POST['account-setup-confirm-password']))) {
                    echo '<span style="color:red;">4Error</span>';
                    exit();
                }
                $confirm_password = $_POST['account-setup-confirm-password'];
                if ($password != $confirm_password) {
                    echo '<span style="color:red;">5Error</span>';
                    exit();
                }
                if (!emailMatch($email)) {
                    echo '<span style="color:red;">6Error</span>';
                    exit();
                }
                $email = validateEmail($email);
                $username = filter_var($username, FILTER_SANITIZE_STRING);
                
                if (!empty(trim($_POST['account-setup-security-question-answer']))) {
                    $security_question = $_POST['account-setup-security-question'];
                    $security_answer = filter_var($_POST['account-setup-security-question-answer'], FILTER_SANITIZE_STRING);
                    $security_question_use = true;
                }
    
                $cipher = 'AES-128-CTR';
                $iv_length = openssl_cipher_iv_length($cipher);
                $options = 0;
                $iv = '1234567891011121';
    
                $e_email = openssl_encrypt($email, $cipher, $oskk, $options, $iv);
                $e_pw = openssl_encrypt($confirm_password, $cipher, $oskk, $options, $iv);
                if ($security_question_use) {
                    $e_sq = openssl_encrypt($security_question, $cipher, $oskk, $options, $iv);
                    $e_sqa = openssl_encrypt($security_answer, $cipher, $oskk, $options, $iv);
                }
                $jsondata = file_get_contents('../json/account.json');
                $jsondata = json_decode($jsondata);
                $jsondata->{'username'} = $username;
                $jsondata->{'email'} = $e_email;
                $jsondata->{'password'} = $e_pw;
    
                if ($security_question_use) {
                    $jsondata->{'security_question'} = $e_sq;
                    $jsondata->{'security_answer'} = $e_sqa;
                }
                file_put_contents('../json/account.json',json_encode($jsondata));
                $saved_data = file_get_contents('../json/account.json');
                $saved_data = json_decode($saved_data);
                if (isset($saved_data->{'username'}) && isset($saved_data->{'password'})) {
                    header("Location: /setup/success/");
                    $_SESSION['setup-step-1-complete'] = true;
                    set_audit_log('Account setup completed.', 'System');
                } else {
                    set_audit_log('Account setup failed.','System');
                    echo '<span style="color:red;">8Error</span>';
                    exit();
                }
            }
        } else {
            header("Location: /");
        }
    });

    $router->match('GET|POST','page/', function () {
        global $setup; 
        if (!$setup) {
            ?>
            <div class="flex flex-col mx-auto w-5/12 mt-12">
                <h2 class="text-primaryText text-4xl text-center font-semibold">Site Setup</h2>
                <small class="text-primaryText text-center my-2">Required fields <b class="text-red-600">*</b></small>
                <form class="" method="POST">
                    <section class="flex flex-col w-6/12 mx-auto mt-4 mb-6">
                        <label class="text-lg text-primaryText my-2">Your CMShark API key <b class="text-red-600">*</b></label>
                        <small class="italic text-accent mb-3">* Don't have one? Click <a href="" class="underline hover:no-underline font-semibold">here</a> to get yours.</small>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText placeholder:italic" type="text" placeholder="api key" name="site-setup-api">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto mt-4 mb-6">
                        <label class="text-lg text-primaryText my-2">Your CMShark Account ID <b class="text-red-600">*</b></label>
                        <small class="italic text-accent mb-3">* Don't have one? Click <a href="" class="underline hover:no-underline font-semibold">here</a> to get yours.</small>
                        <input class="bg-backgroundAccent py-2 px-3 text-primaryText rounded-sm placeholder:text-secondaryText placeholder:italic" type="text" placeholder="account id" name="site-setup-account-id">
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                        <section class="flex flex-col mx-auto mb-4">
                            <label class="text-lg text-primaryText my-2">Site theme <b class="text-red-600">*</b></label>
                            <div class="flex flex-row mx-auto w-12/12">
                                <div class="flex items-center px-4 w-[150px] rounded border border-gray-200 dark:border-gray-700 mx-5">
                                    <input id="bordered-radio-1" type="radio" value="rounded" name="site-setup-theme" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Rounded</label>
                                </div>
                                <div class="flex items-center px-4 w-[150px] rounded border border-gray-200 dark:border-gray-700 mx-5">
                                    <input id="bordered-radio-2" type="radio" value="boxed" name="site-setup-theme" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-2" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Boxed</label>
                                </div>
                            </div>
                            <a href="https://cmshark.com/cmshark/theme-demo" class="text-accent text-center hover:underline my-2" target="_blank">View demos</a>
                        </section>
                    </section>
                    <section class="flex flex-col w-6/12 mx-auto mt-6 mb-4">
                        <input class="text-center text-lg text-primaryText ring ring-accent bg-accent w-fit place-self-center py-1 px-3 rounded-sm hover:underline font-semibold cursor-pointer" type="submit" value="Save">
                    </section>
                </form>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty(trim($_POST['site-setup-api']))) {
                    echo '<span style="color:red;">1Error</span>';
                    exit();
                }
                $api_key = $_POST['site-setup-api'];
                if (empty(trim($_POST['site-setup-user-id']))) {
                    echo '<span style="color:red;">2Error</span>';
                    exit();
                }
                $user_id = $_POST['site-setup-user-id'];
                if (empty(trim($_POST['site-setup-theme']))) {
                    echo '<span style="color:red;">3Error</span>';
                    exit();
                }
                $theme = $_POST['site-setup-theme'];
                
                $api_key = filter_var($api_key, FILTER_SANITIZE_STRING);
                $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
    
                $config = json_decode(file_get_contents('../json/config.json'));
                $config->{'cmshark'}->{'api-key'} = $api_key;
                $config->{'cmshark'}->{'user-id'} = $user_id;
                $config->{'settings'}->{'page'}->{'theme'}->{'layout'} = $theme;
                $config = json_encode($config);
                file_put_contents('../json/config.json', $config);
                
                $saved = json_decode(file_get_contents('../json/config.json'));
                if (isset($saved->{'cmshark'}->{'api-key'}) && isset($saved->{'cmshark'}->{'user-id'})) {
                    header('Location: /setup/success');
                    set_audit_log('Page setup completed.','System');
                } else {
                    set_audit_log('Page setup failed.', 'System');
                    echo '<span style="color:red;">4Error</span>';
                    exit();
                }
            }
        } else {
            header("Location: /");
        }
    });
    $router->get('success/', function () {
        global $setup; 
        global $setup_file;
        if (!$setup) {
            ?>
            <div class="flex flex-col mx-auto">
                <div class="flex flex-col mx-auto w-5/12 mt-12" id="welcome-container">
                    <h1 class="text-primaryText text-center text-4xl font-semibold" >Success!</h1>
                    <span class="text-primaryText my-5 text-lg">
                        Your CMShark site has been setup successfully. You can now edit the page, page settings and configuration of the site. 
                        Get started with checking out the <a href="https://docs.cmshark.com" target="_blank" class="text-accent hover:underline">documentation</a> or 
                        jump right into your site <a href="/admin" class="text-accent hover:underline">admin</a> page.
                    </span>
                </div>
            </div>
            <?php
            set_audit_log('CMShark setup process completed.', 'System');
            $content = json_decode(file_get_contents($setup_file));
            $content->{'setup'}->{'setup-complete'} = true;
            $content = json_encode($content);
            file_put_contents($setup_file, $content);
        } else {
            header("Location: /");
        }
    });
    $router->run();
?>
    </body>
</html>
