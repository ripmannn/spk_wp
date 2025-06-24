<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    protected $fillable = ['code', 'name', 'weight', 'type'];

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
