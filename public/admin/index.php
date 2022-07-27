<?php
//require './src/functions.php';
//require '../../config/config.php';
//redirectForNotLoggedIn();
?>
<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="../tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor">
        <!--<nav class="" id="navigation-bar">
            <ul>
                <li><a href="#" class="">Home</a></li>
                <li><a href="page-settings.php?ref=dash" class="">Page Settings</a></li>
                <li><a href="admin-settings.php?ref=dash" class="">Admin Settings</a></li>
            </ul>
            <a href="../logout.php" class="text-xl">Logout</a>
        </nav>-->
        <main class="">
            <form method="POST" class="w-4/12 flex flex-col mx-auto">
                <section class="flex flex-col bg-backgroundAccent rounded-md mt-12">
                    <h3 class="text-primaryText text-center mt-5 text-2xl font-bold">Edit Header</h3>
                    <div class="mx-8 my-5 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Name</label>
                        <input class="placeholder:text-secondaryText w-5/12 bg-backgroundColor rounded p-2 text-primaryText" type="text" placeholder="John Doe">
                    </div>
                    <div class="mx-8 my-2 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Bio</label>
                        <input class="placeholder:text-secondaryText w-5/12 bg-backgroundColor rounded p-2 text-primaryText" type="text" placeholder="I am John Doe!">
                    </div>
                    <div class="mx-8 my-5 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Profile Picture</label>
                        <label class="cursor-pointer w-5/12 bg-backgroundColor rounded p-2 text-primaryText text-secondaryText">
                            <i class="fa-solid fa-upload mr-2"></i>
                            Upload Image
                            <input type="file" class="hidden" value="Upload-Image" name="userProfilePicture"> 
                        </label>
                    </div>
                    <div class="mx-8 mt-2 mb-5">
                        <input class="w-2/12 bg-accent hover:bg-accentLighter cursor-pointer p-2 rounded text-primaryText font-semibold" type="submit" value="Save">
                    </div>
                </section>
            </form>
        </main>
        <script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
        <script>
        kofiWidgetOverlay.draw('wclarkedev', {
            'type': 'floating-chat',
            'floating-chat.donateButton.text': 'Support devs',
            'floating-chat.donateButton.background-color': '#FF715B',
            'floating-chat.donateButton.text-color': '#fff'
        });
        </script>
    </body>
</html>