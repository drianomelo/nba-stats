<?php

namespace App\Repositories;
use App\Http\Requests\TeamsFormRequest;
use DB;
use App\Models\Team;
use App\Models\Player;

class TeamsRepository
{
    public function add(TeamsFormRequest $request)
    {
        return DB::transaction(function () use ($request) {
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

            return $team;
        });
    }
}
