<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
	public function mahasiswa()
	{
		return $this->belongsTo(Mahasiswa::class);
	}
    
    public function ruang()
	{
		return $this->belongsTo(Ruang::class);
	}

	
}
