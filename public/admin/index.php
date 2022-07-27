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
                <section class="flex flex-col bg-backgroundAccent rounded-md">
                    <h3 class="text-primaryText text-center mt-4 text-2xl font-bold">Edit Header</h3>
                    <div class="mx-8 my-5 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Name</label>
                        <input class="placeholder:text-secondaryText w-5/12 bg-backgroundColor rounded p-2 text-primaryText" type="text" placeholder="John Doe">
                    </div>
                    <div class="mx-8 my-5 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Bio</label>
                        <input class="placeholder:text-secondaryText w-5/12 bg-backgroundColor rounded p-2 text-primaryText" type="text" placeholder="I am John Doe!">
                    </div>
                    <div class="mx-8 my-5 flex flex-col">
                        <label class="mb-1 text-primaryText text-lg">Profile Picture</label>
                        <label class="">
                            Upload Image
                            <input type="file" value="Upload-Image" name="userProfilePicture"> 
                        </label>
                    </div>
                    <!--

                    <label>Picture</label>
                    <label class="file-upload">
                        Upload Image
                        <input type="file" value="Upload-Image" name="userProfilePicture"> 
                    </label>
                    -->
                </section>
            </form>
        </main>
    </body>
</html>