<?php
//require '../config/db.php';
//require '../functions.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: /admin/");
}
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start();
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];

// Email / Username checks 
    if (isset($usernameEmail) && !empty(trim($usernameEmail))) {
         if (emailMatch($usernameEmail)) $email = validateEmail($usernameEmail);
         else $username = $usernameEmail;
    }
    if (isset($username)) {
        // Check DB for username
    }
    if (isset($email)) {
        // Check DB for email 
    }

// Password checks
}
?>
<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="../tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Login</title>
        <meta name="title" content="Login">
    </head>
    <body class="bg-backgroundColor">
        <main class="bg-backgroundAccent w-4/12 flex flex-col mx-auto rounded-md mt-16">
            <h1 class="text-3xl text-primaryText text-center my-5">Login</h1>
            <form method="POST" class="flex flex-col mx-auto w-7/12 mb-5">
                <div class="flex flex-col my-2 ">
                    <label class="text-primaryText text-lg mb-1">Username or email</label>
                    <input class="placeholder:text-secondaryText w-12/12 bg-backgroundColor rounded p-2 text-primaryText" type="text" autocomplete="off" name="usernameEmail" placeholder="will@cmshark.com">
                </div>
                <div class="flex flex-col my-2">
                    <label class="text-primaryText text-lg mb-1">Password</label> 
                    <input class="placeholder:text-secondaryText w-12/12 bg-backgroundColor rounded p-2 text-primaryText" type="password" autocomplete="off" name="password" placeholder="**********">
                </div>
                <div class="place-self-center my-2 mt-5">
                    <input class="bg-backgroundColor cursor-pointer text-primaryText ring px-8 py-2 hover:ring-accent focus:ring-accent ring-gray-600 rounded" type="submit" value="Login">
                </div>
                <a class="mt-5 pl-4 text-accent font-semibold hover:underline focus:underline w-4/12" href="/">Return to site</a>
            </form>
            
        </main>
    </body>
</html>