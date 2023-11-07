<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Infografis extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];





    protected $casts = [
        'made_refrences' => 'array',
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'     => 'title'
            ]
        ];
    }
    public function infosher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function infopost(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


}
