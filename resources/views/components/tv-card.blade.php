<div class="mt-8">
    <a href="{{ route('tv.show', $tvshow['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('tv.show', $tvshow['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $tvshow['name'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span><img src="https://img.icons8.com/emoji/18/000000/star-emoji.png"/></span>
            <span class="ml-1">{{ $tvshow['vote_average'] * 10 .'%' }}</span>
            <span class="mx-2">|</span>
            <span>{{ \Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d, Y') }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{-- tv show genre --}}
            @foreach ($tvshow['genre_ids'] as $genre)
                {{ $genres->get($genre) }}@if (!$loop->last), @endif
            @endforeach
        </div>
    </div>
</div>
