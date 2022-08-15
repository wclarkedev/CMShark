<?php
require './functions.php';

?>
<!doctype html><html lang="en">
    <head>
        <meta name="charset" content="utf-8">
        <meta name="viewport" content="width=device-width,intitial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="tailwind.config.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title></title>
        <meta name="title" content="">
        <meta name="description" content="">
    </head>
    <body class="bg-backgroundColor">
        <section id="header" class="xl:w-6/12 sm:w-8/12 w-8/12 bg-backgroundAccent flex flex-col mx-auto rounded-md mt-10">
            <div class="flex flex-col mx-auto my-6">
                <img class="rounded-full h-32 w-32" alt="Profile Picture" 
                src="https://images.unsplash.com/photo-1637734433731-621aca1c8cb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=404&q=80">
            </div>
            <div class="flex flex-col mx-auto mb-4">
                <h1 class="text-primaryText text-3xl font-bold text-center mb-2">Placeholder Name</h1>
                <span class="text-base text-secondaryText text-center max-w-xs">Placeholder bio</span>
            </div>
            <div class="xl:w-6/12 sm:w-8/12 flex flex-wrap flex-row mx-auto mb-6 justify-center">
                <!-- Icons for social media -->
                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://github.com/'.$username;?>"><i class="fa-brands fa-github"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://bitbucket.org/'.$username;?>"><i class="fa-brands fa-bitbucket"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://gitlab.com/'.$username;?>"><i class="fa-brands fa-gitlab"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.behance.net/'.$username;?>"><i class="fa-brands fa-behance"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.linkedin.com/in/'.$username;?>"><i class="fa-brands fa-linkedin"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://'.$username.'.medium.com/';?>"><i class="fa-brands fa-medium"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.patreon.com/'.$username;?>"><i class="fa-brands fa-patreon"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'mailto:'.$usernameEmail;?>"><i class="fa-solid fa-envelope"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'tel:'.$usernamePhoneNum;?>"><i class="fa-solid fa-phone"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://discord.gg/'.$usernameServer;?>"><i class="fa-brands fa-discord"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.quora.com/profile/'.$username;?>"><i class="fa-brands fa-quora"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.reddit.com/user/'.$username;?>"><i class="fa-brands fa-reddit"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://twitter.com/'.$username;?>"><i class="fa-brands fa-twitter"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.twitch.tv/'.$username;?>"><i class="fa-brands fa-twitch"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.instagram.com/'.$username;?>"><i class="fa-brands fa-instagram"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.facebook.com/'.$username;?>"><i class="fa-brands fa-facebook"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo $link;?>"><i class="fa-brands fa-discourse"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://wa.me/'.$usernameNum; /*https://faq.whatsapp.com/563219570998715/?locale=en_US*/?>"><i class="fa-brands fa-whatsapp"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.youtube.com/'.$username;?>"><i class="fa-brands fa-youtube"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://bandcamp.com/'.$username;?>"><i class="fa-brands fa-bandcamp"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.pinterest.com/'.$username;?>"><i class="fa-brands fa-pinterest"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://telegram.me/joinchat/'.$username;?>"><i class="fa-brands fa-telegram"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.tiktok.com/@'.$username;?>"><i class="fa-brands fa-tiktok"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://www.snapchat.com/add/'.$username;?>"><i class="fa-brands fa-snapchat"></i></a>

            </div>
        </section>
        <section id="links" class="xl:w-6/12 sm:w-8/12 w-8/12  flex flex-col mx-auto mb-10 mt-1">
            <a href="" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                <div class="py-2 px-2">
                    <img class="rounded-sm h-20 w-20" alt="placeholder Logo"
                    src="https://images.unsplash.com/photo-1637734433731-621aca1c8cb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=404&q=80">
                </div>
                <div class="flex flex-col py-4 px-6">
                    <h3 class="text-xl text-primaryText">Placeholder Title</h3>
                    <span class="text-base text-secondaryText pt-1">Placeholder Description</span>
                </div>
            </a>
            <a href="" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                <div class="py-2 px-2">
                    <img class="rounded-sm h-20 w-20" alt="placeholder Logo"
                    src="https://images.unsplash.com/photo-1637734433731-621aca1c8cb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=404&q=80">
                </div>                
                <div class="flex flex-col py-4 px-6">
                    <h3 class="text-xl text-primaryText">Placeholder Title</h3>
                    <span class="text-base text-secondaryText pt-1">Placeholder Description</span>
                </div>
            </a>
        </section>
    </body>
</html>