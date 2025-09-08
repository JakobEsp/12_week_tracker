<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goal extends Model
{
    protected $fillable = [
        'year_id',
        'title',
        'info',
        'lag_indicator',
        'lag_indicator_type'
    ];

    public function year():BelongsTo{
        return $this->belongsTo(Year::class);
    }

    public function tactics(): HasMany{
        return $this->hasMany(Tactic::class);
    }
}
