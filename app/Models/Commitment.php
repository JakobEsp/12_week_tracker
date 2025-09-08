<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commitment extends Model
{
    protected $fillable = [
        'year_id',
        'title',
        'description'
    ];


    public function year(): BelongsTo{
        return $this->belongsTo(Year::class);
    }
}
