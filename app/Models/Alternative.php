<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alternative extends Model
{
    protected $fillable = ['name'];
    
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
