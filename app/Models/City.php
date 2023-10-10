<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar' , 'name_en' , 'state_id'];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function neighbourhoods(){
        return $this->hasMany(Neighbourhood::class);
    }
    
}
