<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Infografis extends Model
{
    use HasFactory, Sluggable;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'     => 'title'
            ]
        ];
    }

    public function bioowner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
