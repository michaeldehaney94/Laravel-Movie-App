@extends('layouts.main')

@section('content')
{{-- movie info detail --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/'.$actor['profile_path'] }}" alt="poster" class="w-76">
                <ul class="flex items-center mt-4">
                    @if ($actor['homepage'])
                        <li class="ml-6">
                            <a href="{{ $actor['homepage'] }}" title="Website" target="_blank">
                                <img src="https://img.icons8.com/ios/26/FFFFFF/internet--v1.png"/>
                            </a>
                        </li>
                    @endif

                    @if ($social['instagram_id'])
                        <li class="ml-6">
                            <a href="{{ 'https://www.instagram.com/'.$social['instagram_id'] }}" title="Instagram" target="_blank">
                                <img src="https://img.icons8.com/metro/26/FFFFFF/instagram-new.png"/>
                            </a>
                        </li>
                    @endif

                    @if ($social['facebook_id'])
                        <li class="ml-6">
                            <a href="{{ 'https://www.facebook.com/'.$social['facebook_id'] }}" title="Facebook" target="_blank">
                                <img src="https://img.icons8.com/ios-filled/28/FFFFFF/facebook-new.png"/>
                            </a>
                        </li>
                    @endif

                    @if ($social['twitter_id'])
                        <li class="ml-6">
                            <a href="{{ 'https://twitter.com/'.$social['twitter_id'] }}" title="Twitter" target="_blank">
                                <img src="https://img.icons8.com/sf-black-filled/35/FFFFFF/twitter.png"/>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span class="ml-2">Born {{ \Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }} in {{ $actor['place_of_birth'] }}</span>

                </div>

                <p class="text-gray-300 mt-8">{{ $actor['biography'] }}</p>

                <h4 class="font-semibold mt-12">Known For</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                        @foreach ($castMovies as $movie)
                            <div class="mt-4">
                                <a href="{{ route('movies.show', $movie['id']) }}">
                                    <img src="{{ 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/'.$movie['poster_path'] }}" alt="Untitled" class="hover:opacity-75 transition ease-in-out duration-150">
                                    <a href="" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                        {{ $movie['title'] }}
                                    </a>
                                </a>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
        {{-- Casting --}}
        <div class="credits border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Credits</h2>
                <ul class="list-disc leading-loose pl-5 mt-8">
                    @foreach ($creditsDetail as $credit)
                        <li>{{ \Carbon\Carbon::parse($credit['release_date'])->format('Y') }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
