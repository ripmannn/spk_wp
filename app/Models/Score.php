<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    protected $fillable = ['alternative_id', 'criteria_id', 'value'];
    
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class);
    }
    
    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }
}
