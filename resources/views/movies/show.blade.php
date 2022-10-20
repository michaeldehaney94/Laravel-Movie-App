@extends('layouts.main')

@section('content')
{{-- movie info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{asset('thor.jpg')}}" alt="Thor" class="w-96 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">Thor: Love and Thunder (2022)</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><img src="https://img.icons8.com/emoji/18/000000/star-emoji.png"/></span>
                    <span class="ml-1">64%</span>
                    <span class="mx-2">|</span>
                    <span>July 6, 2022</span>
                    <span class="mx-2">|</span>
                    <span> Action, Adventure, Comedy</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Thor enlists the help of Valkyrie, Korg and ex-girlfriend Jane Foster to fight Gorr the God Butcher, who intends to make the gods extinct.
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Taika Waititi</div>
                            <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Taika Waititi</div>
                            <div class="text-sm text-gray-400">Screenplay</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5
                        py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <img src="https://img.icons8.com/material-outlined/24/000000/play-button-circled--v1.png"/>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                <div class="mt-8">
                    <a href="#">
                        <img src="{{asset('chris.jpg')}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Chris Hemsworth</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span><img src="https://img.icons8.com/emoji/18/000000/star-emoji.png"/></span>
                            <span class="ml-1">64%</span>
                            <span class="mx-2">|</span>
                            <span>July 6, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Adventure, Comedy
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
