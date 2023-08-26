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

        $game = Game::create($data);;
        $game->developers()->sync($data['developers']);
        $game->publishers()->sync($data['publishers']);
        foreach ($data['trophies'] as $trophyId) {
            $trophy = Trophy::find($trophyId);
            $trophy->game()->associate($game);
            $trophy->save();
        }

        return redirect()->route('store');
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
        return view('store/edit-game', [
            'game' => $game
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function editView(Game $game)
    {
        return view('store/edit-game', [
            'game' => $game
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
            'developer' => 'required|exists:developers,id',
            'publisher' => 'required|exists:publishers,id',
        ]);

        $game->update($data);

        // Sync the developer relationship to the one specified in the request
        $game->developers()->sync([$data['developer']]);
        $game->publishers()->sync([$data['publisher_id']]);

        return redirect()->route('store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('store');
    }

    public function deleteView(Game $game)
    {
        return view('store/delete-game', [
            'game' => $game
        ]);
    }

    public function delete(Game $game)
    {
        $game->delete();
        return redirect()->route('store');
    }
    public function showSliderAndGames()
    {
        $topGames = Game::orderBy('units_sold', 'desc')->take(5)->get();
        $newestGames = Game::orderBy('release_date', 'desc')->take(3)->get();

        $covers = $topGames->pluck('cover'); // Assuming 'cover' is the field name for cover URLs
        $names = $topGames->pluck('name');

        return view('home.index', [
            'covers' => $covers,
            'names' => $names,
            'newestGames' => $newestGames
        ]);
    }
}
