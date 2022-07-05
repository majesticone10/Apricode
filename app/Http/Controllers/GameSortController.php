<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameSortController extends Controller
{
    public function sort ($id){

        $genres = Game::orderBy('genre')->distinct()->get();

        $games = Game::orderBy($id)->paginate(10);
        
        return view('games.index', [
            'games' => $games,
            'genres' => $genres,
        ]);

    }
}
