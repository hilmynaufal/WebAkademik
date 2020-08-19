<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    //
    public function index() {

        $guru = DB::table('guru')->get();
        $pelajaran = DB::table('pelajaran')->get();

    	$data = DB::table('jadwal')->join('guru', 'jadwal.Nip', '=', 'guru.Nip')->join('pelajaran', 'jadwal.kode_pelajaran', '=', 'pelajaran.kode_pelajaran')->get();

    	return view('jadwal', ['jadwal' => $data, 'guru' => $guru, 'pelajaran' => $pelajaran]);
    	
    }

    public function store(Request $request) {
    	DB::table("jadwal")->insert([
    		'Nip' => $request->Nip,
    		'kode_pelajaran' => $request->kode_pelajaran,
            'sks' => $request->sks,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
    	]);

    	return redirect('jadwal');
    }

    public function update(Request $request) {
        //
         DB::table("jadwal")->where("Id_jdwl", $request->Id_jdwl)->update([
            'Nip' => $request->Nip,
            'kode_pelajaran' => $request->kode_pelajaran,
            'sks' => $request->sks,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
        ]);

        return redirect('jadwal');
    }

    public function destroy($id) {
    	DB::table('jadwal')->where('Id_jdwl', $id)->delete();

        return redirect('jadwal');
    }
}
