<?php

namespace App\Http\Controllers;

use App\Repositories\TeamsRepository;

use Illuminate\Http\Request;
use App\Http\Requests\TeamsFormRequest;

use App\Models\Team;


class TeamController extends Controller
{
    public function __construct(private TeamsRepository $repository)
    {

    }

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
        $team = $this->repository->add($request);

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
        $players = $team->players;
        $court = $team->court;

        return view('teams.edit', compact('team', 'court', 'players'));
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
