<?php

namespace App\Http\Controllers;

use App\Models\Game;
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
        return view('store/create-game');
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
            'developer' => 'required|exists:developers,id',
            'publisher' => 'required|exists:publishers,id',
        ]);

        $data['cover'] = $request->cover;

        $game = Game::create($data);
        $game->developers()->attach($data['developer']);
        $game->publishers()->attach($data['publisher_id']);

        return redirect()->route('store'); // Redirect to the "store" page after adding the game
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
    public function showSlider()
    {
        $topGames = Game::orderBy('units_sold', 'desc')->take(5)->get();

        $covers = $topGames->pluck('cover'); // Assuming 'cover' is the field name for cover URLs
        $names = $topGames->pluck('name');

        return view('home.index', [
            'covers' => $covers,
            'names' => $names
        ]);
    }
}
