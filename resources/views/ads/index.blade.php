@extends('ads.layout')
@section('content')
    <div class="overflow-none">
        @include('components.header')
        <main class="flex">
            <aside class="fixed mr-20 overflow-y-scroll h-screen bg-white w-68 rounded-md mx-5 mt-20">
                <form action="" id="filterForm">
                    <ul class="mx-5 flex flex-col gap-4">
                        <li class="pt-4 text-gray-400 font-semibold">
                            Filter By
                        </li>
                        <li>
                            <span class="font-bold text-indigo-400">Categories</span>
                            <hr class="text-gray-300 mt-2">
                            <div class="mt-3 ">
                                @foreach ($categories as $item)
                                <div>
                                    <input type="checkbox" name="" id="" class="accent-indigo-400 outline-none">
                                    <label for="" class="font-normal text-gray-600">{{ $item->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </form>
            </aside>
            <section class="grid grid-cols-2 ml-76 mr-10 gap-8 p-4 w-full mt-20">
                @foreach ($ads as $ad)
                    <div class="rounded-md flex gap-4">
                        @if (!empty($ad->photos->first()))
                        <img src="" alt="{{$ad->title}}" class="h-40 w-40 text-gray-400 rounded-t-md bg-gray-50">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-40 text-white bg-gray-50 rounded-md px-3">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                        </svg>
                        @endif
                        <ul class="w-4/5">
                            <li class=" flex justify-between items-center">
                                <span class="block font-medium text-lg capitalize text-gray-400">{{$ad->title}}</span>
                                <span class="block uppercase text-white text-[9px] font-bold rounded-full px-2 py-1 bg-indigo-400">{{$ad->category->name}}</span>
                            </li>
                            <li class="font-medium text-gray-700 mt-3 line-clamp-2">
                                {{$ad->description}}
                            </li>
                            <li class=" flex items-top mt-2">
                                {{-- @if (true)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-gray-50">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                    </svg>
                                @endif --}}
                                <span class="block font-medium text-[10px] capitalize text-gray-700">Par <span class="text-indigo-400">{{ $ad->user->login}}</span></span>
                            </li>
                            <li class="font-medium text-gray-700 mt-3 line-clamp-2">
                                {{"$ " . $ad->price}}
                            </li>

                        </ul>
                    </div>
                @endforeach
            </section>
        </main>
    </div>
@endsection
