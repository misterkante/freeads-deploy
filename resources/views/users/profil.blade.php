@extends('users.layout')

@section('content')
<div data-state="active" data-orientation="horizontal" role="tabpanel"
                                aria-labelledby="radix-:r6:-trigger-profile" id="radix-:r6:-content-profile" tabindex="0"
                                class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                                style="">
                                <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                                    <div class="flex flex-col space-y-1.5 p-6">
                                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Informations
                                            personnelles</h3>
                                    </div>
                                    <div class="p-6 pt-0">
                                        <form class="space-y-4">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div><label
                                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                        for="firstName">Prénom</label><input
                                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                        id="firstName" placeholder="Votre prénom"></div>
                                                <div><label
                                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                        for="lastName">Nom</label><input
                                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                        id="lastName" placeholder="Votre nom"></div>
                                            </div>
                                            <div><label
                                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                    for="email">Email</label><input
                                                    class="flex h-10 w-full rounded-md border border-input px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm bg-gray-100"
                                                    id="email" disabled="disabled" value="kantegilchrist@gmail.com">
                                            </div>
                                            <div><label
                                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                    for="phone">Téléphone</label><input
                                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                    id="phone" placeholder="Votre numéro de téléphone"></div><button
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500"
                                                type="submit">Sauvegarder</button>
                                        </form>
                                    </div>
                                </div>
</div>
@endsection

