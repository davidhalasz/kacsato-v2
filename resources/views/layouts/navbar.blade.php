@php
    $routeName = Route::currentRouteName();
@endphp

<nav x-data="{ isOpenMobileMenu: false }" class="absolute z-50 inset-x-0 top-0 w-full bg-blue-700/50 backdrop-blur-md mm">
    <div class="mx-auto max-w-7xl px-2 lg:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <!-- Mobile menu button-->
                <button @click="isOpenMobileMenu = !isOpenMobileMenu" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 
                    hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white lg:hidden"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg x-show="!isOpenMobileMenu" class="block lg:hidden h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg x-show="isOpenMobileMenu" class="block lg:hidden h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start">

                <div class="hidden lg:ml-6 lg:block">
                    <div class="flex justify-between space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-white hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="text-white hover:text-white hover:bg-gray-700 rounded-md px-3 py-2 text-md"
                            aria-current="page">Kezdőlap</a>
                        <div x-data="{ isOpen: false }"
                            class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3" @mouseenter="isOpen = true" @mouseleave="isOpen = false">
                                <div>
                                    <button type="button"
                                        class="relative flex items-center text-md  gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                                        aria-expanded="false" aria-haspopup="true">
                                        <p class="text-white">
                                            Rólunk</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </div>

                                <div x-show="isOpen" @click.away="isOpen = false"
                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Rövid ismertető</a>
                                    <a href="/rolunk/megkozelites" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Megközelítés</a>
                                    <a href="/rolunk/parkolas" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Parkolás</a>
                                    <a href="/rolunk/hazirend" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Házirend</a>
                                </div>
                            </div>
                        </div>

                        <a href="/esemenynaptar"
                            class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-md ">Eseménynaptár</a>

                        <div x-data="{ isOpen: false }"
                            class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3" @mouseenter="isOpen = true" @mouseleave="isOpen = false">
                                <div>
                                    <button type="button"
                                        class="relative flex text-md  gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                                        aria-expanded="false" aria-haspopup="true">
                                        <p class="text-white">
                                            Rendezvényhelyszín</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </div>

                                <div x-show="isOpen" @click.away="isOpen = false"
                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Ismertető</a>
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Kapcsolat</a>
                                </div>
                            </div>
                        </div>

                        <a href="/galeria"
                            class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-md ">Galéria</a>

                        <div x-data="{ isOpen: false }"
                            class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3" @mouseenter="isOpen = true" @mouseleave="isOpen = false">
                                <div>
                                    <button type="button"
                                        class="relative flex text-md  gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                                        aria-expanded="false" aria-haspopup="true">
                                        <p class="text-white">
                                            Turizmus</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </div>

                                <div x-show="isOpen" @click.away="isOpen = false"
                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Szállások</a>
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Éttermek, bárok, cukrászdák</a>
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Kerékpár bérlés</a>
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Kenu bérlés</a>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ isOpen: false }"
                            class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3" @mouseenter="isOpen = true" @mouseleave="isOpen = false">
                                <div>
                                    <button type="button"
                                        class="relative flex text-md  gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                                        aria-expanded="false" aria-haspopup="true">
                                        <p class="text-white">
                                            Látnivalók</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </div>

                                <div x-show="isOpen" @click.away="isOpen = false"
                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Kacsa-tó és környéke</a>
                                    <a href="/latnivalok/szarvas" class="block px-4 py-2 text-md  text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Szarvas és környéke</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpenMobileMenu" class="lg:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 text-white">
            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-md "
                aria-current="page">Kezdőlap</a>

            <div x-data="{ isOpen: false }" class="flex items-center text-white">
                <div class="flex flex-col" @click="isOpen = !isOpen">
                    <div>
                        <button type="button"
                            class="flex text-md items-center gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                            aria-expanded="false" aria-haspopup="true">
                            <p class="block py-2 text-md">Rólunk</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </button>
                    </div>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        class="ml-4 origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Rövid ismertető</a>
                        <a href="/rolunk/megkozelites" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Megközelítés</a>
                        <a href="/rolunk/parkolas" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Parkolás</a>
                        <a href="/rolunk/hazirend" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Házirend</a>
                    </div>
                </div>
            </div>

            <a href="/esemenynaptar" class="text-white rounded-md px-3 py-2 text-md "
                aria-current="page">Eseménynaptár</a>

            <div x-data="{ isOpen: false }" class="flex items-center text-white">
                <div class="flex flex-col" @click="isOpen = !isOpen">
                    <div>
                        <button type="button"
                            class="flex text-md items-center gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                            aria-expanded="false" aria-haspopup="true">
                            <p lass="block py-2 text-md">Rendezvényhelyszín</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </button>
                    </div>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        class="ml-4 origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Ismertető</a>
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Kapcsolat</a>
                    </div>
                </div>
            </div>

            <a href="#" class="text-white rounded-md px-3 py-2 text-md "
                aria-current="page">Galéria</a>

            <div x-data="{ isOpen: false }" class="flex items-center">
                <div class="flex flex-col text-white" @click="isOpen = !isOpen">
                    <div>
                        <button type="button"
                            class="flex text-md items-center gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                            aria-expanded="false" aria-haspopup="true">
                            <p class="block py-2 text-md">Turizmus</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </button>
                    </div>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        class="ml-4 origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Szállások</a>
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Éttermek, bárok, cukrászdák</a>
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Kerékpár bérlés</a>
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Kenu bérlés</a>
                    </div>
                </div>
            </div>

            <div x-data="{ isOpen: false }" class="flex items-center">
                <div class="flex flex-col text-white " @click="isOpen = !isOpen">
                    <div>
                        <button type="button"
                            class="flex text-md items-center gap-1 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2"
                            aria-expanded="false" aria-haspopup="true">
                            <p class="block py-2 text-md">Látnivalók</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </button>
                    </div>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        class="ml-4 origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Kacsa-tó környéke</a>
                        <a href="/latnivalok/szarvas" class="block px-4 py-2 text-md " role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Szarvas környéke</a>
                    </div>
                </div>
            </div>
        </div>
</nav>
