<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category_id',
        'user_id',
        'is_published',
        'published_at',
    ];
    
    protected $dates = [
        'published_at',
    ];
    
    /**
     * Relation avec la catégorie
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    
    /**
     * Relation avec l'auteur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];
    
}
