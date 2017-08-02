<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    public function mahasiswa()
    {
    	return $this->belongsToMany(Mahasiswa::class);
    }

    public function absen()
	{
		return $this->hasMany(Absen::class);
	}

	public function jam()
	{
		return $this->hasOne(Jam::class);
	}
}
