<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamsFormRequest;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $successMessage = session('success.message');

        return view('teams.index', compact('teams', 'successMessage'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(TeamsFormRequest $request)
    {
        $team = Team::create($request->all());

        $players = [];
        for($i = 1; $i <= $request->player; $i++) {
            $players[] = ([
                'teams_id' => $team->id,
                'number' => $i
            ]);
        }
        Player::insert($players);

        $team->court()->create([
            'name' => $request->court,
        ]);

        return to_route('teams.index')->with('success.message', "Time '{$team->city} {$team->name}' adcionado com sucesso!");
    }

    public function show(Team $team)
    {
        $players = $team->players;
        $court = $team->court;

        return view('teams.show', compact('players', 'court', 'team'));
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(TeamsFormRequest $request, Team $team)
    {
        $team->update($request->all());

        return to_route('teams.index')->with('success.message', "Time '{$team->city} {$team->name}' editado com sucesso!");
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return to_route('teams.index')->with('success.message', "Time '{$team->city} {$team->name}' removido com sucesso!");
    }
}
