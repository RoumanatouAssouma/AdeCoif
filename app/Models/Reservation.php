<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'appointment_time',
        'notes',
        'status',
    ];
    
    protected $dates = [
        'appointment_time',
    ];
    
    /**
     * Relation avec le service
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
