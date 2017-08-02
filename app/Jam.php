<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    public function Ruang()
	{
		return $this->belongsTo(Ruang::class);
	}
}