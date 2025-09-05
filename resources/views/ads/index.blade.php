@extends('ads.layout')
@section('content')
    <div class="overflow-none">
        @include('components.header')
        <main class="flex">
            <aside class="fixed overflow-y-scroll h-screen bg-white w-68 rounded-md mx-5 mt-28">
                <form action="" id="filterForm">
                    <ul class="flex flex-col gap-4 mr-8">
                        <li class="pt-4 text-gray-400 font-semibold">
                            Filter By
                        </li>
                        <li class="w-full">
                            <label for="categories" class="font-bold text-indigo-400">Categories</label>
                            <hr class="text-gray-300 mt-2">
                                    <select name="categories[]" id="categories" class="w-full border border-gray-500 rounded-full px-2 py-1 h-8" multiple>
                                        <option value="All">All</option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                        </li>
                        {{--  --}}
                        <li class="w-full">
                            <label for="location" class="font-bold text-indigo-400">Location</label>
                            <hr class="text-gray-300 mt-2">
                                    <select name="location" id="location" class="w-full border border-gray-500 rounded-full px-2 py-1">
                                        <option value="All">All</option>
                                        @foreach ($locations as $item)
                                        <option value="{{$item->id}}">{{$item->location}}</option>
                                        @endforeach
                                    </select>
                        </li>
                        {{--  --}}
                        <li class="w-full">
                            <label for="location" class="font-bold text-indigo-400">Price range</label>
                            <hr class="text-gray-300 mt-2">
                           <div class="mt-6 w-60">
                                <div class="relative  mr-8">
                                    <!-- Custom Range Inputs -->
                                    <input type="range" id="minRange" min="0" max="10000" value="0">
                                    <input type="range" id="maxRange" min="0" max="10000" value="10000">
                                    <!-- Custom Track -->
                                    <div class="relative h-2 bg-gray-200 rounded-md">
                                        <div id="" class="absolute h-2 bg-gradient-to-r from-gray-300 to-gray-50 rounded-md "></div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-[18px] text-gray-600 mr-8">
                                    <span id="minValue">0</span>
                                    <span id="maxValue">10000</span>
                                </div>
                            </div>
                        </li>
                        {{--  --}}
                        <li class="w-full">
                            <label for="condition" class="font-bold text-indigo-400">Condition</label>
                            <hr class="text-gray-300 mt-2">
                            <div class="flex justify-between">
                                <input type="radio" name="condition" id="condition">New</input>
                                <input type="radio" name="condition" id="condition">Good</input>
                                <input type="radio" name="condition" id="condition">Used</input>
                            </div>
                        </li>
                    </ul>
                </form>
            </aside>
            <section class="ml-76 mr-10 w-full mt-28 ">
                @if (!empty($ads))
                <div class="font-light bg-indigo-100 p-3 mb-3 ml-10 text-gray-400">
                    <span class="text-indigo-800 font-medium text-lg">{{ $ads->total()}} ads </span> matched @if($search) {{$search}} @endif!
                </div>
                @endif

                <div class="grid grid-cols-2 gap-x-4 gap-y-2 ml-10">
                    @foreach ($ads as $ad)
                        <a href="{{route('ads.show', $ad)}}">
                            <div class="rounded-md flex gap-4 shadow shadow-indigo-50 p-4">
                                @if (!empty($ad->photos->first()))
                                <img src="{{asset('storage/' . $ad->photos->first()->path)}}" alt="{{$ad->photos->first()->path}}" class="h-40 w-40 text-gray-400 rounded-md bg-gray-50">
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-40 text-white bg-gray-50 rounded-md px-3">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                </svg>
                                @endif
                                <ul class="w-4/5">
                                    <li class=" flex justify-between items-center">
                                        <span class="block font-light text-lg capitalize text-gray-400">{{$ad->title}}</span>
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
                        </a>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const minRange = document.getElementById("minRange");
        const maxRange = document.getElementById("maxRange");
        const minValue = document.getElementById("minValue");
        const maxValue = document.getElementById("maxValue");
        const rangeTrack = document.getElementById("rangeTrack");
        const minGap = 10;

        function updateRange() {
            let min = parseInt(minRange.value);
            let max = parseInt(maxRange.value);

            // Ensure min & max have a gap of at least `minGap`
            if (max - min < minGap) {
                if (event.target === minRange) {
                    minRange.value = max - minGap;
                } else {
                    maxRange.value = min + minGap;
                }
            }

            minValue.innerText = minRange.value;
            maxValue.innerText = maxRange.value;

            let minPercent = (minRange.value / 400) * 100;
            let maxPercent = (maxRange.value / 400) * 100;
            rangeTrack.style.left = minPercent + "%";
            rangeTrack.style.right = 100 - maxPercent + "%";
        }

        // Event listeners for input changes
        minRange.addEventListener("input", updateRange);
        maxRange.addEventListener("input", updateRange);

        updateRange(); // Initialize the UI on load
    });
    </script>
@endsection

{{--
const minRange = document.getElementById("minRange");
    const maxRange = document.getElementById("maxRange");
    const minValue = document.getElementById("minValue");
    const maxValue = document.getElementById("maxValue");
    const rangeTrack = document.getElementById("rangeTrack");
    const minGap = 10;

    function updateRange() {
        let min = parseInt(minRange.value);
        let max = parseInt(maxRange.value);

        // Ensure min & max have a gap of at least `minGap`
        if (max - min < minGap) {
            if (event.target === minRange) {
                minRange.value = max - minGap;
            } else {
                maxRange.value = min + minGap;
            }
        }

        minValue.innerText = USDollar.format(minRange.value);
        maxValue.innerText = USDollar.format(maxRange.value);

        let minPercent = (minRange.value / 10000) * 100;
        let maxPercent = (maxRange.value / 10000) * 100;
        rangeTrack.style.left = minPercent + "%";
        rangeTrack.style.right = 100 - maxPercent + "%";
    }

    // Event listeners for input changes
    minRange.addEventListener("input", updateRange);
    maxRange.addEventListener("input", updateRange);

    updateRange(); / --}}
