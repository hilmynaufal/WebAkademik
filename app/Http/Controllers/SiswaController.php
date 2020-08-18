<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //

    public function index() {

    	$data = DB::table('siswa')->get();

    	return view('siswa', ['siswa' => $data]);
    	
    }

    public function store(Request $request) {
    	DB::table("siswa")->insert([
    		'Nisn' => $request->Nisn,
    		'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'tingkat' => $request->tingkat
    	]);

    	return redirect('siswa');
    }

    public function update(Request $request) {
        //
         DB::table("siswa")->where('Nisn', $request->Nisn)->update([
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'tingkat' => $request->tingkat
        ]);

        return redirect('/siswa');
    }

    public function destroy($id) {
    	DB::table('nilai')->where('Nisn', $id)->delete();
        DB::table('siswa')->where('Nisn', $id)->delete();

        return redirect('siswa');
    }
    
}
