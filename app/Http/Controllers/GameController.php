<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Trophy;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Get the authenticated user
        $games = Game::all();

        return view('store/store', [
            'user' => $user,
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = Developer::all();
        $publishers = Publisher::all();
        $trophies = Trophy::all();

        return view('store/create-game', [
            'developers' => $developers,
            'publishers' => $publishers,
            'trophies' => $trophies,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'genre' => 'required|min:3',
            'release_date' => 'required|date',
            'price' => 'required|numeric',
            'cover' => 'required|url',
            'developers' => 'required|array',
            'publishers' => 'required|array',
            'trophies' => 'required|array',
        ]);

        $games = Game::create($data);
        $games->developers()->sync($data['developers']);
        $games->publishers()->sync($data['publishers']);
        foreach ($data['trophies'] as $trophyId) {
            $trophy = Trophy::find($trophyId);
            $trophy->game()->associate($games);
            $trophy->save();
        }

        return redirect()->route('store-view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        $game = Game::find($game->id);

        return view('store/store', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $developers = Developer::all();
        $publishers = Publisher::all();
        $trophies = Trophy::all();

        return view('store/edit-game', [
            'game' => $game,
            'developers' => $developers,
            'publishers' => $publishers,
            'trophies' => $trophies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function editView(Game $game)
    {
        $developers = Developer::all();
        $publishers = Publisher::all();
        $trophies = Trophy::all();

        return view('store/edit-game', [
            'game' => $game,
            'developers' => $developers,
            'publishers' => $publishers,
            'trophies' => $trophies
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'genre' => 'required|min:3',
            'release_date' => 'required|date',
            'price' => 'required|numeric',
            'cover' => 'required|url',
            'developers' => 'required|array',
            'publishers' => 'required|array',
            'trophies' => 'required|array',
        ]);


        $game->update($data);


        $game->developers()->sync($request->input('developers'));
        $game->publishers()->sync($request->input('publishers'));


        $trophyIds = $request->input('trophies');
        $game->trophies()->update(['game_id' => null]);
        Trophy::whereIn('id', $trophyIds)->update(['game_id' => $game->id]);

        return redirect()->route('store-view');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->developers()->detach();
        $game->publishers()->detach();
        $game->trophies->each(function ($trophy) {
            $trophy->game_id = null;
            $trophy->save();
        });

        $game->delete();

        return redirect()->route('store-view');
    }

    public function deleteView(Game $game)
    {
        return view('store/delete-game', [
            'game' => $game
        ]);
    }

    public function delete(Game $game)
    {
        $game->developers()->detach();
        $game->publishers()->detach();
        $game->trophies->each(function ($trophy) {
            $trophy->game_id = null;
            $trophy->save();
        });

        $game->delete();
        return redirect()->route('store-view');
    }
    public function showSliderAndGames()
    {
        $topGames = Game::orderBy('units_sold', 'desc')->take(5)->get();
        $newestGames = Game::orderBy('release_date', 'desc')->take(3)->get();

        $covers = $topGames->pluck('cover');
        $names = $topGames->pluck('name');

        return view('home.index', [
            'covers' => $covers,
            'names' => $names,
            'newestGames' => $newestGames
        ]);
    }
}
