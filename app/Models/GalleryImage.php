<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'image',
        'description',
        'category_id',
    ];
    
    /**
     * Relation avec la catégorie
     */
    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}
