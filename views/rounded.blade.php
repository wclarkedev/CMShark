<body class="bg-backgroundColor">

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
                if (isset($pageHeader['bio']) && !empty(trim($pageHeader['bio']))) echo getPageContent('bio');
                else echo $defaultHeader['bio'];
        ?></span>
        <span class="text-base text-accent font-semibold text-center mt-1"><i class="fa-solid fa-location-dot mr-1"></i><?php
                if (isset($pageHeader['location']) && !empty(trim($pageHeader['location']))) echo getPageContent('location');
                else echo $defaultHeader['location'];
        ?></span>
    </div>
    <div class="xl:w-6/12 sm:w-8/12 flex flex-wrap flex-row mx-auto mb-6 justify-center">
        <?php 
        foreach ($social_icons_list as $icon) {
            $icon_data = getIcon($icon);
            if (!empty($icon_data)) {
                ?>
                <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                href="<?php echo $icon_data['link']?>"><i class="<?php echo $icon_data['fa']?>"></i></a>
                <?php
            }

        }?>
    </div>
</section>
<section id="links" class="xl:w-6/12 sm:w-8/12 w-8/12 flex flex-col mx-auto mb-10 mt-1">
    <?php
        if (checkLinks()) {
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
<!--<div class="fixed bottom-1 right-1 px-4 pt-2 pb-4 md:py-2 bg-backgroundAccent z-10 border border-accent text-center text-primaryText flex flex-col md:flex-row items-center justify-center" id="cookie-consent">
    <i class="fa-solid fa-cookie-bite mx-1"></i> We are using cookies to enhance your experience on this site. By using this site, you agree to our use of cookies.
    
    <div class="cursor-pointer px-6 pt-2 pb-4 md:px-0 md:pt-0 md:pb-0" data-behavior="accept-cookie-consent">
        <button class="md:mb-0 ml-0 md:ml-4 px-3 py-1 rounded-md bg-backgroundColor hover:ring hover:ring-accent">Okay</button>
    </div>
</div>-->
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