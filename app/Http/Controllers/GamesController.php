<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use App\Http\Requests\CreateGameRequest;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all()->sortBy('date');
        return view('games', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('createGame', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGameRequest $request)
    {
        $input = $request->all();

        $game = new Game();
        $game->team1_id = $input['team1_id'];
        $game->team2_id = $input['team2_id'];
        $game->team1_score = $input['team1_score'];
        $game->team2_score = $input['team2_score'];
        $game->date = $input['date'];
        $game->is_finished = $input['is_finished'];
        $game->save();

        if ($game->is_finished == 1) {

            $team1Players = $game->team1->players->all();
            foreach ($team1Players as $player) {
                $game->players()->attach($player->id);
            }

            $team2Players = $game->team2->players->all();
            foreach ($team2Players as $player) {
                $game->players()->attach($player->id);
            }
        }

        return redirect(route('games'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        return view('game', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::all();
        $game = Game::findOrFail($id);
        return view('editGame', ['game' => $game, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGameRequest $request, $id)
    {
        $input = $request->all();

        $game = Game::findOrFail($id);
        $game->team1_id = $input['team1_id'];
        $game->team2_id = $input['team2_id'];
        $game->team1_score = $input['team1_score'];
        $game->team2_score = $input['team2_score'];
        $game->date = $input['date'];
        $game->is_finished = $input['is_finished'];

        \DB::table('game_player')->where('game_id', $id)->delete();

        if ($game->is_finished == 0) {
            $game->team1_score = null;
            $game->team2_score = null;
        }

        $game->save();

        $team1Players = $game->team1->players->all();
        foreach ($team1Players as $player) {
            $game->players()->attach($player->id);
        }

        $team2Players = $game->team2->players->all();
        foreach ($team2Players as $player) {
            $game->players()->attach($player->id);
        }

        return redirect(route('games'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect(route('games'));
    }
}
