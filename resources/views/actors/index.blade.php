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
                    <a href="{{ route('actors.show', $actor['id']) }}">
                        {{-- If actor profile image does not exist replace with name initials --}}
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
                        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-sm truncate text-gray-400">
                            {{ collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')
                                ->union(collect($actor['known_for'])->where('media_type', 'tv')->pluck('name'))
                                ->implode(', ')
                            }}
                        </div>
                    </div>
                </div>
               @endforeach

            </div>
        </div>
        {{-- Pagination for actors --}}
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinte-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>
        {{-- <div class="flex justify-between mt-16">
            @if ($previous)
                <a href="/actors/page/{{ $previous }}">Previous</a>
            @else
                <div></div>
            @endif

            @if ($next)
                <a href="/actors/page/{{ $next }}">Next</a>
            @else
                <div></div>
            @endif
        </div> --}}

    </div>

@endsection
{{-- Loads more actors onto the screen --}}
@section('scripts')
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
<script>

    let elem = document.querySelector('.grid');
    let infScroll = new InfiniteScroll( elem, {
        // options
        path: '/actors/page/@{{#}}',
        append: '.actor',
        status: '.page-load-status'
        //history: false,
    });

</script>
@endsection
