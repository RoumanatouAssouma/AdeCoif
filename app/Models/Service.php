<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'duration',
        'image',
        'is_featured',
        'category_id',
    ];
    
    /**
     * Relation avec la catégorie de service
     */
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
    
    /**
     * Relation avec les réservations
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    /**
     * Formater le prix en FCFA
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', ' ') . ' FCFA';
    }
}
