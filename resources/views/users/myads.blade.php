@extends('users.layout')

@section('content')
<div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex justify-between items-center space-y-1.5 p-6">
                      <h3 class="text-2xl font-semibold leading-none tracking-tight">My Adds</h3>
                      <a href="{{route('ads.create')}}" class="block p-4 bg-green-600 hover:bg-green-500 w-max text-white rounded-md">New Add + </a>
                    </div>
                    <div class="p-6 pt-0">
                      <div class="space-y-4">
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
                                    <li class="flex items-center gap-4">
                                        <a href="{{route('ads.edit', $ad->slug)}}"><button class="bg-blue-600 px-4 py-2  hover:bg-blue-500 rounded-md">Modifier</button></a>
                                        <form action="{{route('ads.destroy',$ad)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="bg-red-700 hover:bg-white hover:text-red-700 hover:border hover:border-red-700 p-2 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg></button>
</a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    @endforeach

                      </div>
                    </div>
                  </div>
@endsection
