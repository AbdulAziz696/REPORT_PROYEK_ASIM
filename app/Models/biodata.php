<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class biodata extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bioowner(): BelongsTo
     {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
