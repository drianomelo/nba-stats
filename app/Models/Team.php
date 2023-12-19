<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city'];

    public function players()
    {
        return $this->hasMany(Player::class, 'teams_id');
    }

    public function court()
    {
        return $this->hasOne(Court::class, 'teams_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('order', function(Builder $queyBuilder) {
            $queyBuilder->orderBy('city');
        });
    }
}
