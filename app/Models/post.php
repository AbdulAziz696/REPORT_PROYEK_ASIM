<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded=[];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'     => 'title'
            ]
        ];
    }

    public function Post(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
