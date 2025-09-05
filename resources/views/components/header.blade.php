<header>
        <nav class="p-4 flex justify-between items-center w-full fixed bg-white shadow-md ">
            <div class="flex items-center font-bold">
                <img src="https://delta-tech.gmb-maps.com/mao-b" alt="Logo" class="w-20 h-12">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-14 text-indigo-500">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM8.547 4.505a8.25 8.25 0 1 0 11.672 8.214l-.46-.46a2.252 2.252 0 0 1-.422-.586l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.211.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.654-.261a2.25 2.25 0 0 1-1.384-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.279-2.132Z"
                        clip-rule="evenodd" />
                </svg> --}}

                <h1 class="text-indigo-400 ml-3 ">FreeAds</h1>
            </div>
            {{--  --}}
            <form class="w-full md:w-2/5" action="{{route('ads.index')}}" method="get" id="searchForm">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="search" id="search" name="search"
                            class="block py-2 px-4 w-full text-sm text-gray-400 font-light focus:font-medium bg-gray-100 rounded-full focus:ring-transparent focus:outline-none"
                            placeholder="Search..." />
                        <button type="submit"
                            class="absolute bottom-1 end-0 p-2.5 text-sm font-medium h-full text-indigo-400 focus:outline-none ">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
            {{--  --}}
            <div class="flex items-center gap-8 mr-8">
                @if (auth()->user())
                <a href="{{route('users.profile')}}" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>

                </a>
                <form action="{{route('logout')}}" method="post" class="text-indigo-400 ">
                    @csrf
                    <div class="flex items-center text-sm text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                        <button type="submit">
                            Logout
                        </button>
                    </div>
                </form>
                @else
                <a href="{{route('show.login')}}" class="text-indigo-400 ">
                    <div class="flex items-center text-sm  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 me-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>
                        <span>
                            Sign in
                        </span>
                    </div>
                </a>
                @endif

                {{--  --}}

            </div>
        </nav>
    </header>
