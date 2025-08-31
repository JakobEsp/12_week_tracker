<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tactic extends Model
{
    protected $fillable = [
        'goal_id',
        'title'
    ];

    public function goal(): BelongsTo{
        return $this->belongsTo(Goal::class);
    }

    public function due_weeks():BelongsToMany{
        return $this->belongsToMany(Week::class);
    }
}
