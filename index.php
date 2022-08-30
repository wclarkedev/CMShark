<?php
 require 'json/functions.php';
 $defaultHeader = defaultContent('page_header'); 
 $defaultMeta = defaultContent('page_meta');
 $defaultLinks = defaultContent('links');
 $pageHeader = getPageContent('page_header');
 $pageMeta = getPageContent('page_meta');
 $pfp = getImages('pfp');
 $favicon = getImages('favicon');
 $defaultImages = getImages('default');
 $links = getPageContent('links');

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
                    //if (isset($pfp) && !empty(trim($pfp))) echo $pfp;
                    /*else*/ echo 'https://cdn.discordapp.com/attachments/1001586892199960636/1011372204870602833/Screenshot_20220617-224430_Instagram.jpg';
                ?>">
            </div>
            <div class="flex flex-col mx-auto mb-4">
                <h1 class="text-primaryText text-3xl font-bold text-center mb-2"><?php
                        if (isset($pageHeader['name']) && !empty(trim($pageHeader['name']))) echo getPageContent('name');
                        else echo $defaultHeader['name'];
                ?></h1>
                <span class="text-base text-secondaryText text-center max-w-xs"><?php
                //? Add possibility for use of markdown? 
                //? https://github.com/MarketingPipeline/Markdown-Tag -- Markdown implementation in the html. 
                //? Other possibilities- Allow option for text decorations. Code MD interpretor. Dont allow text decorations.
                        if (isset($pageHeader['bio']) && !empty(trim($pageHeader['bio']))) echo getPageContent('bio');
                        else echo $defaultHeader['bio'];
                ?></span>
                <span class="text-base text-accent font-semibold text-center mt-1"><i class="fa-solid fa-location-dot"></i><?php
                        if (isset($pageHeader['location']) && !empty(trim($pageHeader['location']))) echo getPageContent('location');
                        else echo $defaultHeader['location'];
                ?></span>
            </div>
            <div class="xl:w-6/12 sm:w-8/12 flex flex-wrap flex-row mx-auto mb-6 justify-center">
                <?php
                if (!empty(trim(socialIcons('Github')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://github.com/'.socialIcons('Github');?>"><i class="fa-brands fa-github"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Bitbucket')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://bitbucket.org/'.socialIcons('Bitbucket');?>"><i class="fa-brands fa-bitbucket"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Gitlab')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://gitlab.com/'.socialIcons('Gitlab');?>"><i class="fa-brands fa-gitlab"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Behance')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.behance.net/'.socialIcons('Behance');?>"><i class="fa-brands fa-behance"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Linkedin')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.linkedin.com/in/'.socialIcons('Linkedin');?>"><i class="fa-brands fa-linkedin"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Medium')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://'.socialIcons('Medium').'.medium.com/';?>"><i class="fa-brands fa-medium"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Patreon')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.patreon.com/'.socialIcons('Patreon');?>"><i class="fa-brands fa-patreon"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Email')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'mailto:'.socialIcons('Email');?>"><i class="fa-solid fa-envelope"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Phone')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'tel:'.socialIcons('Phone');?>"><i class="fa-solid fa-phone"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Quora')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.quora.com/profile/'.socialIcons('Quora');?>"><i class="fa-brands fa-quora"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Reddit')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.reddit.com/user/'.socialIcons('Reddit');?>"><i class="fa-brands fa-reddit"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Twitter')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://twitter.com/'.socialIcons('Twitter');?>"><i class="fa-brands fa-twitter"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Twitch')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.twitch.tv/'.socialIcons('Twitch');?>"><i class="fa-brands fa-twitch"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Instagram')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.instagram.com/'.socialIcons('Instagram');?>"><i class="fa-brands fa-instagram"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Facebook')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.facebook.com/'.socialIcons('Facebook');?>"><i class="fa-brands fa-facebook"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Discourse')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo socialIcons('Discourse');?>"><i class="fa-brands fa-discourse"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Youtube')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.youtube.com/'.socialIcons('Youtube');?>"><i class="fa-brands fa-youtube"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Bandcamp')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://bandcamp.com/'.socialIcons('Bandcamp');?>"><i class="fa-brands fa-bandcamp"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Pinterest')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.pinterest.com/'.socialIcons('Pinterest');?>"><i class="fa-brands fa-pinterest"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Telegram')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://telegram.me/joinchat/'.socialIcons('Telegram');?>"><i class="fa-brands fa-telegram"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Tiktok')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.tiktok.com/@'.socialIcons('Tiktok');?>"><i class="fa-brands fa-tiktok"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Snapchat')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://www.snapchat.com/add/'.socialIcons('Snapchat');?>"><i class="fa-brands fa-snapchat"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Stackoverflow')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://stackoverflow.com/users/'.socialIcons('Stackoverflow'); /* 16269149/will-clarke*/?>"><i class="fa-brands fa-stack-overflow"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Discord')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo 'https://discord.com/users/'.socialIcons('Discord')/*(id)*/;?>"><i class="fa-brands fa-discord"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Blogger')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo socialIcons('Blogger');?>"><i class="fa-brands fa-blogger"></i></a>
                    <?php
                }

                if (!empty(trim(socialIcons('Tumblr')))) {
                    ?>
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="<?php echo socialIcons('Tumblr'); /* could be tumblr sub domain or custom domain */?>"><i class="fa-brands fa-tumblr"></i></a>
                    <?php
                }?>
<!--
                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo 'https://wa.me/'.$usernameNum; /*https://faq.whatsapp.com/563219570998715/?locale=en_US*/?>"><i class="fa-brands fa-whatsapp"></i></a>

                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo ''.$username;?>"><i class="fa-brands fa-facebook-messenger"></i></a>                          
-->
            </div>
        </section>
        <section id="links" class="xl:w-6/12 sm:w-8/12 w-8/12 flex flex-col mx-auto mb-10 mt-1">
            <?php
                if (checkLinks()) {
                    //? Default links
                    for ($i = 0; $i < count($defaultLinks); $i++) {
                        ?>
                            <a href="<?php echo $defaultLinks[$i]->{'link'}?>" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                                <div class="py-2 px-2">
                                    <img class="rounded-sm h-20 w-20" alt="Link Logo" src="
                                        <?php echo getImages('link_icon', $defaultLinks[$i]->{'link'});?>
                                    ">
                                </div>                
                                <div class="flex flex-col py-4 px-6">
                                    <h3 class="text-xl text-primaryText md:p-0 py-5"><?php echo $defaultLinks[$i]->{'title'}?></h3>
                                    <span class="text-base text-secondaryText hidden md:flex"><?php echo $defaultLinks[$i]->{'description'}?></span>
                                </div>
                            </a>
                        <?php
                    }
                }
                if (!checkLinks()) {
                    //? User links
                    for ($i = 0; $i < count($links); $i++) {
                        ?>
                        <a href="<?php echo $links[$i]->{'link'};?>" class="bg-backgroundAccent my-1 h-24 text-primaryText flex-row flex rounded-md hover:bg-backgroundAccentLighter">
                            <div class="py-2 px-2">
                                <img class="rounded-sm h-20 w-20" alt="Link Logo" src="/images/default.png">
                            </div>                
                            <div class="flex flex-col py-4 px-6">
                                <h3 class="text-xl text-primaryText md:p-0 py-5"><?php echo $links[$i]->{'title'};?></h3>
                                <span class="text-base text-secondaryText hidden md:flex"><?php echo $links[$i]->{'description'};?></span>
                            </div>
                        </a>
                        <?php
                    }
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