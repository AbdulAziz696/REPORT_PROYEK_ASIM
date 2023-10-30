<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, Sluggable;


    protected $guarded = [];
    protected $casts = [
        'made_by' => 'array',
    ];




    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'     => 'title'
            ]
        ];
    }

    public function postwriter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   


}
