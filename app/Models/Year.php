<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    protected $fillable = [
        'vision'
    ];


    public function weeks(): HasMany {
        return $this->hasMany(Week::class);
    }

    public function commitments(): HasMany{
        return $this->hasMany(Commitment::class);
    }

}
