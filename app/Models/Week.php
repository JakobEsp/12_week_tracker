<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Week extends Model
{
    protected $fillable = [
        'year_id',
        'number',
        'starts_at',
        'ends_at'
    ];



    public function year():BelongsTo{
        return $this->belongsTo(Year::class);
    }

    public function tactics(): BelongsToMany {
        return $this->belongsToMany(Tactic::class);
    }
}
