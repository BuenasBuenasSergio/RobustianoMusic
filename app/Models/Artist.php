<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;


    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function country()
    {
        //relation 1:1
        return $this->belongsTo(Country::class);
    }
}
