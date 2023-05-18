<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'subtitle',
        'tags',
        'content',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter ($query, array $filters){
        // dd($filters['tag']);
        if($filters['tag'] ?? false ) {
            $query->where('tags', 'like', '%'.request('tag').'%');
        }

        if($filters['search'] ?? false ) {
            $query->where('title', 'like', '%'.request('search').'%')
            ->orWhere('content','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%');
            
        }
    }
    
}