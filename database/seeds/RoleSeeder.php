<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Role;
        $a->id = 1;
        $a->nama = "mahasiswa";
        $a->save();
    }
}
