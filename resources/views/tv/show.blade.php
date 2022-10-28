@extends('layouts.main')

@section('content')
{{-- tv show info detail --}}
    <div class="tv-show-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'] }}" alt="poster" class="w-96 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><img src="https://img.icons8.com/emoji/18/000000/star-emoji.png"/></span>
                    <span class="ml-1">{{ $tvshow['vote_average'] * 10 .'%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                         {{-- tv show genre --}}
                         {{ collect($tvshow['genres'])->pluck('name')->flatten()->implode(', ') }}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $tvshow['overview'] }}
                </p>

                <div class="mt-12">
                    {{-- <h4 class="text-white font-semibold">Featured Cast</h4> --}}
                    <div class="flex mt-4">
                        {{-- @foreach ($tvshow['credits']['crew'] as $crew) --}}
                        @foreach ($tvshow['created_by'] as $crew)
                            {{-- loops through crew members and displays only two --}}
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    {{-- <div class="text-sm text-gray-400">{{ $crew['job'] }}</div> --}}
                                    <div class="text-sm text-gray-400">Creator</div>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($tvshow['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $tvshow['videos']['results'][0]['key'] }}" target="_blank"
                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5
                            py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <img src="https://img.icons8.com/material-outlined/24/000000/play-button-circled--v1.png"/>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Casting --}}
    <div class="tv-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvshow['credits']['cast'] as $cast)
                    @if ($loop->index < 15)
                        <div class="mt-8">
                            <a href="{{ route('actors.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] }}" alt="actor" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{-- Images --}}
    <div class="tv-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvshow['images']['backdrops'] as $image)
                    @if ($loop->index < 15)
                        <div class="mt-8">
                            <a href="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="actor" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>


@endsection
