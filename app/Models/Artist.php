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
        return $this->belongsTo(Country::class, 'id');
    }

    public function albums()
    {
        //relation 1:n
        return $this->hasMany(Album::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
