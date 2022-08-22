<?php
 require 'json/functions.php';
 $defaultHeader = defaultContent('page_header'); 
 $defaultMeta = defaultContent('page_meta');
 $defaultLinks = defaultContent('links');
 $pageContent = getPageContent('page_header');
 $pageMeta = getPageContent('page_meta');
 $pfp = getImages('pfp');
 $favicon = getImages('favicon');
 $defaultImages = getImages('default');

?>
<!doctype html><html lang="en">
    <head>
        <!-- Meta -->
        <meta name="charset" content="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="robots" content="index, follow">
        <meta name="copyright" content="cmshark.com">

        <!-- Imports -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="tailwind.config.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" crossorigin="anonymous">
        
        <!-- Configurable Meta -->
        <title><?php 
                if (isset($pageMeta['title']) && !empty(trim($pageMeta['title']))) echo $pageMeta['title'];
                else echo $defaultMeta['title'];
        ?></title>
        <meta name="title" content="<?php 
                if (isset($pageMeta['title']) && !empty(trim($pageMeta['title']))) echo $pageMeta['title'];
                else echo $defaultMeta['title'];
        ?>">
        <meta name="description" content="<?php 
                if (isset($pageMeta['description']) && !empty(trim($pageMeta['description']))) echo $pageMeta['description'];
                else echo $defaultMeta['description'];
        ?>">
        <link rel="icon" type="image/x-icon" href="<?php
                if (isset($favicon) && !empty(trim($favicon))) echo $favicon;
                else echo $defaultImages['favicon'];
        ?>">
        <meta name="url" content="<?php 
                if (isset($pageMeta['url']) && !empty(trim($pageMeta['url']))) echo $pageMeta['url'];
                else echo $defaultMeta['url'];
        ?>">
        <meta name="language" content="<?php 
                if (isset($pageMeta['lang']) && !empty(trim($pageMeta['lang']))) echo $pageMeta['lang'];
                else echo $defaultMeta['lang'];
        ?>">
        <meta name="og:url" content="<?php 
                if (isset($pageMeta['url']) && !empty(trim($pageMeta['url']))) echo $pageMeta['url'];
                else echo $defaultMeta['url'];
        ?>">
        <meta name="owner" content="<?php 
                if (isset($pageMeta['owner']) && !empty(trim($pageMeta['owner']))) echo $pageMeta['owner'];
                else echo $defaultMeta['owner'];
        ?>">
    </head>
    <body class="bg-backgroundColor">
    <!--<div class="fixed bottom-1 right-1 px-4 pt-2 pb-4 md:py-2 bg-backgroundAccent z-10 border border-accent text-center text-primaryText flex flex-col md:flex-row items-center justify-center" id="cookie-consent">
        <i class="fa-solid fa-cookie-bite mx-1"></i> We are using cookies to enhance your experience on this site. By using this site, you agree to our use of cookies.
        
        <div class="cursor-pointer px-6 pt-2 pb-4 md:px-0 md:pt-0 md:pb-0" data-behavior="accept-cookie-consent">
            <button class="md:mb-0 ml-0 md:ml-4 px-3 py-1 rounded-md bg-backgroundColor hover:ring hover:ring-accent">Okay</button>
        </div>
    </div>-->
        <section id="header" class="xl:w-6/12 sm:w-8/12 w-8/12 bg-backgroundAccent flex flex-col mx-auto rounded-md mt-10">
            <div class="flex flex-col mx-auto my-6">
                <img class="rounded-full h-32 w-32" alt="Profile Picture" 
                src="<?php
                    if (isset($pfp) && !empty(trim($pfp))) echo $pfp;
                    else echo $defaultImages['pfp'];
                ?>">
            </div>
            <div class="flex flex-col mx-auto mb-4">
                <h1 class="text-primaryText text-3xl font-bold text-center mb-2"><?php
                        if (isset($pageContent['name']) && !empty(trim($pageContent['name']))) echo getPageContent('name');
                        else echo $defaultHeader['name'];
                ?></h1>
                <span class="text-base text-secondaryText text-center max-w-xs"><?php
                        if (isset($pageContent['bio']) && !empty(trim($pageContent['bio']))) echo getPageContent('bio');
                        else echo $defaultHeader['bio'];
                ?></span>
                <span class="text-base text-accent font-semibold text-center mt-1"><i class="fa-solid fa-location-dot"></i><?php
                        if (isset($pageContent['location']) && !empty(trim($pageContent['location']))) echo getPageContent('location');
                        else echo $defaultHeader['location'];
                ?></span>
            </div>
            <div class="xl:w-6/12 sm:w-8/12 flex flex-wrap flex-row mx-auto mb-6 justify-center">
                <!-- Icons for social media 
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
                href="<?php echo 'https://discord.com/users/'.$username/*(id)*/;?>"><i class="fa-brands fa-discord"></i></a>

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

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://stackoverflow.com/users/'.$username; /* 16269149/will-clarke*/?>"><i class="fa-brands fa-stack-overflow"></i></a>-->

            </div>
        </section>
        <section id="links" class="xl:w-6/12 sm:w-8/12 w-8/12 flex flex-col mx-auto mb-10 mt-1">
            <?php /*
            $links = getLinks();
            foreach ($links as $link) {?>
                <a href="<?php
                    if (!empty($link['url'])) echo $link['url'];
                    else echo '#';
                ?>" 
                class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">

                <div class="py-2 px-2">
                    <img class="rounded-sm h-20 w-20" alt="placeholder Logo"
                    src="<?php
                        echo $link['image'];
                    ?>">
                </div>
                <div class="flex flex-col py-4 px-6">
                    <h3 class="text-xl text-primaryText md:p-0 py-5"><?php
                        if (!empty($link['title'])) echo $link['title'];
                        else echo $link['urlTitle'];
                    ?></h3>
                    <span class="text-base text-secondaryText hidden md:flex"><?php 
                        if (!empty($link['description'])) echo $link['description'];
                        else echo $link['urlDescription'];
                    ?></span>
                </div>
            </a>
            <?php }
            */?>
            <?php
                if (checkLinks()) {
                    // Default links
                    for ($i = 0; $i < count($defaultLinks); $i++) {
                        ?>
                            <a href="<?php echo $defaultLinks[$i]['href']?>" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                                <div class="py-2 px-2">
                                    <img class="rounded-sm h-20 w-20" alt="placeholder Logo"
                                    src="<?php echo getImages('link_icon', $defaultLinks[$i]['href']);?>">
                                </div>                
                                <div class="flex flex-col py-4 px-6">
                                    <h3 class="text-xl text-primaryText md:p-0 py-5"><?php echo $defaultLinks[$i]['title']?></h3>
                                    <span class="text-base text-secondaryText hidden md:flex"><?php echo $defaultLinks[$i]['desc']?></span>
                                </div>
                            </a>
                        <?php
                    }
                }
                if (!checkLinks()) {
                    // User links
                    ?>
                    <a href="" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                        <div class="py-2 px-2">
                            <img class="rounded-sm h-20 w-20" alt="placeholder Logo"
                            src="https://images.unsplash.com/photo-1637734433731-621aca1c8cb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=404&q=80">
                        </div>                
                        <div class="flex flex-col py-4 px-6">
                            <h3 class="text-xl text-primaryText md:p-0 py-5">tes Title</h3>
                            <span class="text-base text-secondaryText hidden md:flex">Placeholder Description</span>
                        </div>
                    </a>
                    <?php
                }
            ?>
        </section>
        <!--<script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('[data-behavior="accept-cookie-consent"]').forEach(element => {
                element.addEventListener('click', () => {
                    const expirationDate = new Date();
                    expirationDate.setFullYear(expirationDate.getFullYear() + 1);
                    document.cookie = 'cookie_consent_accepted=true; path=/; expires=' + expirationDate.toUTCString();
                    document.getElementById('cookie-consent').classList.add('hidden');
                });
                });
            });
        </script>-->
    </body>
</html>