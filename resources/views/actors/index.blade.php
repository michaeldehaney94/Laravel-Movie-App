@extends('layouts.main')

@section('content')


    <div class="container mx-auto px-4 py-16">

        {{-- Popular Movies --}}

        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               {{-- loop through content --}}
               @foreach ($popularActors as $actor)
                <div class="actor mt-8">
                    <a href="#">
                        @if ($actor['profile_path'] == null)
                        {{-- filler profile for missing images --}}
                        <img src="{{ 'https://ui-avatars.com/api/?size=235&name='.$actor['name'] }}"
                                alt="Poster"
                                class="hover:opacity-75 transition ease-in-out duration-150"
                            >

                        @else
                        {{-- Fetches images of actors --}}
                            <img src="{{ 'https://www.themoviedb.org/t/p/w235_and_h235_face/'.$actor['profile_path'] }}"
                                alt="Poster"
                                class="hover:opacity-75 transition ease-in-out duration-150"
                            >
                        @endif

                    </a>
                    <div class="mt-2">
                        <a href="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-sm truncate text-gray-400">{{ collect($actor['known_for'])->pluck('title')->implode(', ') }}</div>
                    </div>
                </div>
               @endforeach

            </div>
        </div>


    </div>


@endsection
