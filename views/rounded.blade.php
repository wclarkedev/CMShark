{{-- TODO Change design --}}
@php 
    //error_reporting(0);       
    require './functions.php';
    $checkLinks = checkLinks();
@endphp
    <body class="bg-backgroundColor">
{{-- ! Boxed page theme --}}
        <section id="header" class="xl:w-6/12 sm:w-8/12 w-8/12 flex flex-col mx-auto rounded-md mt-10">
            <div class="flex flex-col mx-auto my-6">
                <img class="rounded-full h-32 w-32" alt="Profile Picture" 
                src="https://cdn.discordapp.com/attachments/1001586892199960636/1011372204870602833/Screenshot_20220617-224430_Instagram.jpg">
            </div>
            <div class="flex flex-col mx-auto mb-4">
                <h1 class="text-primaryText text-3xl font-bold text-center mb-2">
                        @if (isset($pageHeader['name']) && !empty(trim($pageHeader['name']))) 
                            {{$pageHeader['name']}}
                        @else 
                            {{$defaultHeader['name']}}
                        @endif
                </h1>
                <span class="text-base text-secondaryText text-center max-w-xs">
                        @if (isset($pageHeader['bio']) && !empty(trim($pageHeader['bio']))) 
                            {{$pageHeader['bio']}}
                        @else 
                            {{$defaultHeader['bio']}}
                        @endif
                </span>
                <span class="text-base text-accent font-semibold text-center mt-1"><i class="fa-solid fa-location-dot mr-1"></i>
                        @if (isset($pageHeader['location']) && !empty(trim($pageHeader['location']))) 
                            {{$pageHeader['location']}}
                        @else 
                            {{$defaultHeader['location']}}
                        @endif
                </span>
            </div>
            <div class="xl:w-6/12 sm:w-8/12 flex flex-wrap flex-row mx-auto mb-6 justify-center"> 
                @foreach ($social_icons_list as $icon) 
                    @php
                        $icon_data = getIcon($icon);
                    @endphp
                    <a class="text-2xl text-primaryText py-1 px-2 hover:text-accent focus:text-accent" 
                    href="{{$icon_data['link']}}"><i class="{{$icon_data['fa']}}"></i></a>
                @endforeach
            </div>
        </section>
        <section id="links" class="xl:w-5/12 sm:w-8/12 w-8/12 flex flex-col mx-auto mb-10 mt-1">
        @if ($checkLinks) 
            @for ($i = 0; $i < count($defaultLinks); $i++) 
                <a href="{{ $defaultLinks[$i]->{'link'} }}" class="relative bg-backgroundAccent my-1 h-14 text-primaryText flex-row flex rounded-full hover:bg-backgroundAccentLighter cmshark-link">
                    <div class="py-2 px-2 absolute">
                        <img class="rounded-full h-10 w-10 justify-center" alt="Link Logo" src="{{ getImages('link_icon', $defaultLinks[$i]->{'link'}) }}">
                    </div>                
                    <div class="flex flex-col mx-auto text-center">
                        <h3 class="text-xl text-primaryText text-center px-2 py-3">{{ $defaultLinks[$i]->{'title'} }}</h3>
                    </div>
                </a>
            @endfor
        @endif
        @if (!$checkLinks) 
            @for ($i = 0; $i < count($links); $i++)
                <a href="{{ $links[$i]->{'link'} }}" class="relative bg-backgroundAccent my-1 h-14 text-primaryText flex-row flex rounded-full hover:bg-backgroundAccentLighter cmshark-link">
                    <div class="py-2 px-2 absolute">
                        <img class="rounded-full h-10 w-10 justify-center" alt="Link Logo" src="{{ getImages('link_icon', $links[$i]->{'link'}) }}">
                    </div>                
                    <div class="flex flex-col mx-auto text-center">
                        <h3 class="text-xl text-primaryText text-center px-2 py-3">{{ $links[$i]->{'title'} }}</h3>
                    </div>
                </a>
            @endfor
        @endif
        </section>
        @if (true)
            <div class="fixed bottom-1 right-1 px-4 pt-2 pb-4 md:py-2 bg-backgroundAccent z-10 border border-accent text-center text-primaryText flex flex-col md:flex-row items-center justify-center" id="cookie-consent">
                <i class="fa-solid fa-cookie-bite mx-1"></i> This site uses cookies. <a class="hover:underline text-accent ml-1" href="https://cmshark.com/cookies"> Read more</a>.
                
                <div class="cursor-pointer px-6 pt-2 pb-4 md:px-0 md:pt-0 md:pb-0" data-behavior="accept-cookie-consent">
                    <button class="md:mb-0 ml-0 md:ml-4 px-3 py-1 rounded-md bg-backgroundColor hover:ring hover:ring-accent">Okay</button>
                </div>
            </div>
            <script>
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
            </script>
        @endif
    </body>