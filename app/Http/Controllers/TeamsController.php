<?php

namespace App\Http\Controllers;

use App\Team;
use App\Player;
use App\Game;

use App\Http\Requests\CreateTeamRequest;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createTeam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        $team = new Team();
        $team->name = $input['name'];
        $team->year_founded = $input['year_founded'];
        $team->save();

        return redirect(route('teams'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        $players = Player::where('team_id', $id)->get();
        $teamGames = Game::where('team1_id', $id)->orWhere('team2_id', $id)->orderBy('date')->get();
        return view('team', ['team' => $team, 'players' => $players, 'teamGames' => $teamGames]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('editTeam', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTeamRequest $request, $id)
    {
        $input = $request->all();

        $team = Team::findOrFail($id);
        $team->name = $input['name'];
        $team->year_founded = $input['year_founded'];
        $team->save();

        return redirect(route('teams'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect(route('teams'));
    }
}
