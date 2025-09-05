<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <meta charset="utf-8" />
    <style>
      .iti {
        width: 100%;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
    <title>FreeAds</title>

</head>

<body>
    <main class="flex-1">
        <div class="transition-all duration-500 ease-in-out opacity-100 transform translate-y-0 scale-100">
            <div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
                <div class="max-w-6xl mx-auto px-4 py-8">
                    <div class="mb-8">
                        <h1
                            class="text-3xl font-bold bg-black bg-clip-text text-black mb-2">
                            My Account
                        </h1>
                        <p class="text-gray-600">Welcome Merveil</p>
                    </div>
                    <div dir="ltr" data-orientation="horizontal" class="space-y-6">
                        <div role="tablist" aria-orientation="horizontal"
                            class="h-10 items-center justify-between rounded-md bg-muted p-1 text-muted-foreground grid w-full grid-cols-4"
                            tabindex="0" data-orientation="horizontal" style="outline: none;">
                            <a href="{{route('users.profile')}}">
                                <button type="button"
                                role="tab" aria-selected="true" aria-controls="radix-:r6:-content-profile"
                                data-state="{{ Route::currentRouteName() == "users.profile" ? "active" : "inactive" }}" id="radix-:r6:-trigger-profile"
                                class="justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm flex items-center gap-2"
                                tabindex="0" data-orientation="horizontal" data-radix-collection-item="">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user w-4 h-4">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profile
                            </button>
                        </a>
                            <a href="{{route('users.myads')}}">
                                <button type="button" role="tab" aria-selected="false"
                                aria-controls="radix-:r6:-content-orders" data-state="{{ Route::currentRouteName() == "users.myads" ? "active" : "inactive" }}"
                                id="radix-:r6:-trigger-orders"
                                class="justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm flex items-center gap-2"
                                tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-package w-4 h-4">
                                    <path
                                        d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z">
                                    </path>
                                    <path d="M12 22V12"></path>
                                    <path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7"></path>
                                    <path d="m7.5 4.27 9 5.15"></path>
                                </svg>
                                My Ads
                            </button>
                        </a>
                            <a href="{{route('users.settings')}}">
                                <button type="button" role="tab" aria-selected="false"
                                aria-controls="radix-:r6:-content-settings" data-state="{{ Route::currentRouteName() == "users.settings" ? "active" : "inactive" }}"
                                id="radix-:r6:-trigger-settings"
                                class="justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm flex items-center gap-2"
                                tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-settings w-4 h-4">
                                    <path
                                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                Settings
                            </button>
                        </a>
                        </div>
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
