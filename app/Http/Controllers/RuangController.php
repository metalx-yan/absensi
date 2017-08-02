<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
use App\Absen;
use App\Mahasiswa;
use App\Jam;
use Auth;

use Carbon\Carbon;

class RuangController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function join($ruang, $mahasiswa)
    {
        $kelas = Ruang::find($ruang);

        $mahasiswa = Mahasiswa::where('nim', $mahasiswa)->first();
        $kelas->mahasiswa()->attach($mahasiswa);

        return redirect()->back();
    }

    public function batal($ruang, $mahasiswa)
    {
        $kelas = Ruang::find($ruang);

        $mahasiswa = Mahasiswa::where('nim', $mahasiswa)->first();
        $kelas->mahasiswa()->detach($mahasiswa);

        if (Auth::user()->mahasiswa->absen->where('ruang_id', $ruang)->first()) {

        Absen::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('ruang_id', $ruang)->first()->delete();
        }

        return redirect()->back();
    }

    public function index()
    {
        $kelas = Ruang::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

                'nama' => 'required|max:40',
                'mata_kuliah' => 'required|max:15'
            ]);

        $kelas = new Ruang;

        $kelas->nama = $request->nama;

        $kelas->mata_kuliah = $request->mata_kuliah;
        $jam = new Jam;
        $jam->jam_masuk = $request->datepicker;
        $jam->jam_keluar = $request->timepicker;
        $kelas->save();
        $kelas->jam()->save($jam);

        return redirect()->route('ruang.show', $kelas->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Ruang::find($id);
        $carbon = Carbon::class;
        $belumHabis = !Carbon::create(date('Y'), date('m'), date('d'), substr($kelas->jam->jam_keluar, 0,2), substr($kelas->jam->jam_keluar, 3,2))->isPast();
        return view('kelas.show', compact('kelas', 'carbon', 'belumHabis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
