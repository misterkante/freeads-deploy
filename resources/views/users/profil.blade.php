@extends('users.layout')

@section('content')
<div data-state="active" data-orientation="horizontal" role="tabpanel"
                                aria-labelledby="radix-:r6:-trigger-profile" id="radix-:r6:-content-profile" tabindex="0"
                                class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                                style="">
                                <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                                    <div class="flex flex-col space-y-1.5 p-6">
                                        <h3 class="text-2xl font-semibold leading-none tracking-tight">My infos</h3>
                                    </div>
                                    <div class="p-6 pt-0">
                                        <form class="space-y-4" method="post" action="{{ route('updateUser') }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-2 gap-4">
                                                <div><label
                                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                        for="name">Login</label><input
                                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                        name="login" id="login" placeholder="John" value="{{$user->login}}">
                                                    </div>
                                                <div><label
                                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                    for="email">Email</label><input
                                                    class="flex h-10 w-full rounded-md border border-input px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm bg-gray-100"
                                                    name="email" disabled="disabled" value="{{$user->email}}">
                                                </div>
                                            <div><label
                                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                    for="phone">Phone</label>
                                                    <div class = "flex justify-between">
                                                        <input type="tel"  name="phone" value="{{ $user->phone }}" id="phone" class="form-control w-full rounded-lg border border-black p-2.5 text-md text-gray-900" placeholder="Enter your phone number" required/>

                                                    </div>
                                                        <button
                                                class="mt-6 text-white flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-blue-600"
                                                type="submit">Update Infos</button>

                                                    </form>


                                            <form action="{{ route('deleteUser') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="flex flex-col space-y-1.5 p-6">
                                                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Delete My account</h3>
                                                </div>
                                                <button
                                                class="mt-6 text-white flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-red-800"
                                                type="submit">Delete Account</button>
                                            </form>
                                            <script>
                                                const phoneInput = document.querySelector("#phone");
                                                window.intlTelInput(phoneInput, {
                                                    initialCountry: "auto",
                                                    geoIpLookup: callback => {
                                                    fetch('https://ipinfo.io/json?token=<YOUR_TOKEN>')
                                                        .then(response => response.json())
                                                        .then(data => callback(data.country))
                                                        .catch(() => callback('bj'));
                                                    },
                                                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                                    });
                                            </script>
                                    </div>
                                </div>
</div>
@endsection

