<?php

use Illuminate\Database\Seeder;
use App\Ruang;
use App\Mahasiswa;
use Carbon\Carbon;
use App\User;
use App\Jam;

class Awalan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        	$u = new User;
        	$u->name = 'user'.$i;
        	$u->email = 'test'.$i.'@test.com';
        	$u->password = bcrypt('secret');
        	$u->save();

            $a = new Mahasiswa;
            $a->nama = "Mahasiswa".$i;
            $a->nim = rand(1,5);

        	$u->mahasiswa()->save($a);
        }


        $r = new Ruang;
        $r->nama = "Ruang";
        $r->mata_kuliah = 'Mata';
        $r->save();

        $jam = new Jam;
        $waktu = Carbon::now()->addHour(2);
        $jam->jam_masuk = Carbon::now();
        $jam->jam_keluar = $waktu;
        $r->jam()->save($jam);
    }
}
