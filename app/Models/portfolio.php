<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class portfolio extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function portowner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
