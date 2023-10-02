<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function neighbourhood(){
        return $this->belongsTo(Neighbourhood::class);
    }

    public function bokerage(){
        return $this->belongsTo(Bokerage::class);
    }

    public function announceType(){
        return $this->belongsTo(AnnounceType::class);
    }
    

}
