<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', "state", "foundation"];

    /**
     * Get the neighbourhoods for city
     */
    public function neighbourhood()
    {
        return $this->hasMany(Neighbourhood::class);
    }
}
