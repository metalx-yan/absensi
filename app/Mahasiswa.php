<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public function ruang()
    {
    	return $this->belongsToMany(Ruang::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function absen()
    {
    	return $this->hasMany(Absen::class);
    }
}
