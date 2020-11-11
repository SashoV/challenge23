<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;

use App\Http\Requests\CreatePlayerRequest;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('players', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('createPlayer', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlayerRequest $request)
    {
        $input = $request->all();

        $player = new Player();
        $player->first_name = $input['firstname'];
        $player->last_name = $input['lastname'];
        $player->date_of_birth = $input['date_of_birth'];
        $player->team_id = $input['team_id'];
        $player->save();

        return redirect(route('players'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);
        return view('player', ['player' => $player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        $teams = Team::all();
        return view('editPlayer', ['player' => $player, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePlayerRequest $request, $id)
    {
        $input = $request->all();

        $player = Player::findOrFail($id);
        $player->first_name = $input['firstname'];
        $player->last_name = $input['lastname'];
        $player->date_of_birth = $input['date_of_birth'];
        $player->team_id = $input['team_id'];
        $player->save();

        return redirect(route('players'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect(route('players'));
    }
}
