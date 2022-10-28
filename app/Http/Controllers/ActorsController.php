<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorsViewModel;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204); //abort pagination page load

        $popularActors = Http::withoutVerifying()
        ->withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular?page='.$page)
        ->json()['results'];

        //dump($popularActors);

        //view model used to create pagination for API
        $viewModel = new ActorsViewModel($page);

        return view('actors.index',
        $viewModel, [
            'popularActors' => $popularActors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Http::withoutVerifying()
        ->withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id)
        ->json();

        $social = Http::withoutVerifying()
        ->withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
        ->json();

        $credits = Http::withoutVerifying()
        ->withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json()['cast'];

        //$castMovies = collect($credits)->where('media_type', 'movie')->sortByDesc('popularity')->take(20)
        $castMovies = collect($credits)->sortByDesc('popularity')->take(15)
        ->map(function($movie) {
            return $movie;
        });

        $creditsDetail = collect($castMovies)->map(function($credit) {
            return $credit;
        })->sortByDesc('release_date');

        //dump($creditsDetail);
        //dump($castMovies);
        //dump($credits);

        return view('actors.show', [
            'actor' => $actor,
            'social' => $social,
            'castMovies' => $castMovies,
            //'credits' => $credits,
            'creditsDetail' => $creditsDetail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
