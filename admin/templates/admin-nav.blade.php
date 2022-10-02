@php
$account = ucfirst($account);
$version = 0.1 . "-alpha";
@endphp
{{-- Admin UI template --}}
{{-- TODO implement auto active nav item on page load (pass page name into blade template and apply relevent styles) 
TODO page content --}}
<aside class="h-screen sticky top-0">
    <nav class="bg-transparent md:h-screen w-full md:w-[300px] border-r border-navBorder px-[16px] pt-[16px]">
        <div>
            <div class="grid grid-cols-2 pb-[16px]">
                {{-- Account icon goes here --}}
                <span class="font-semibold text-lg mx-2" style="color:#fff">{{$account}}</span>
                <div class="justify-self-end">
                    <div class="block md:hidden">
                        <button id="mobileNavOpenIcon" class="mt-1" onclick="toggleNav();"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg></button>
                        <button id="mobileNavCloseIcon" class="hidden mt-1" onclick="toggleNav();"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></button>
                    </div>
                    <code
                        class="hidden md:block px-[5px] py-[4px] text-[12px] text-codeColor bg-codeBackground rounded font-bold"
                        dir="ltr">v {{$version}}</code>
                </div>
            </div>
            <div class="border-t border-navBorder mb-[24px]"></div> {{-- What is this? --}}
            <div id="navigation" class="hidden md:block">

                <a href="/admin" style="font-size: 14px; align-items: center;"
                    class="cusor-pointer hover:text-navHoverTextColor flex text-navIconColor font-semibold bg-transparent hover:bg-navItemHover rounded w-full px-[12px] py-[10px]">
                    <i class="fa-solid fa-house-chimney mr-3 ml-1"></i>
                    <span class="text-center cursor-pointer">Home</span>
                </a>

                <a href="/admin/page/edit" style="font-size: 14px; align-items: center;"
                    class="cusor-pointer hover:text-navHoverTextColor flex text-navIconColor font-semibold bg-transparent hover:bg-navItemHover rounded w-full px-[12px] py-[10px]">
                    <i class="fa-solid fa-pencil mr-3 ml-1"></i>
                    <span class="text-center cursor-pointer">Edit Page</span>
                </a>

                <a href="/admin/page/settings" style="font-size: 14px; align-items: center;"
                    class="cusor-pointer hover:text-navHoverTextColor flex text-navIconColor font-semibold bg-transparent hover:bg-navItemHover rounded w-full px-[12px] py-[10px]">
                    <i class="fa-solid fa-gear mr-3 ml-1"></i>
                    <span class="text-center cursor-pointer">Page Settings</span>
                </a>

                <a href="/admin/account" style="font-size: 14px; align-items: center;"
                    class="cusor-pointer hover:text-navHoverTextColor flex text-navIconColor font-semibold bg-transparent hover:bg-navItemHover rounded w-full px-[12px] py-[10px]">
                    <i class="fa-solid fa-user-gear mr-3 ml-1"></i>
                    <span class="text-center cursor-pointer">Account Settings</span>
                </a>

                <a href="/admin/logs" style="font-size: 14px; align-items: center;"
                    class="cusor-pointer hover:text-navHoverTextColor flex text-navIconColor font-semibold bg-transparent hover:bg-navItemHover rounded w-full px-[12px] py-[10px]">
                    <i class="fa-solid fa-box-archive mr-3 ml-1"></i>
                    <span class="text-center cursor-pointer">Audit Logs</span>
                </a>

            </div>
        </div>
    </nav>
</aside>
