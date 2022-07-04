<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $genres = Game::orderBy('genre')->distinct()->get();

        $games = Game::paginate(10);
        
        return view('games.index', [
            'games' => $games,
            'genres' => $genres,
        ]);
    }

    public function create(Request $request)
    {
        $game = $request->all();
        
         Game::create($game);
        
         return back()->with('status', 'Игра успешано добавлена!');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $update = $request->except('_token');

        Game::where('id', $id)
        ->update([
            'name' => $update['name'],
            'studio' => $update['studio'],
            'genre' => $update['genre'],
        ]);

        return back()->with('status', 'Игра '.$update['name']. ' под номером '.$id.' успешано обновлена!');
    }

    public function update(Request $request, $id)
    {
        dd($request->all(), $id);
    }

    public function destroy($id)
    {
        Game::where('id', $id)->delete();

        return back()->with('status', 'Запись под номером '. $id .' успешано удалена!');
    }
}
