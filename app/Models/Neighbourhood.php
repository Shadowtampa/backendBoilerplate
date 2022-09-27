<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighbourhood extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    /**
     * Get the city of the neighbourhood
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
