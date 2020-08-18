<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    //

    function index() {
    	$siswa = DB::table('siswa')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa]);
    }

    function show($id) {
    	$siswa = DB::table('siswa')->get();
    	$data = DB::table('siswa')->join('nilai', 'siswa.Nisn', '=', 'nilai.Nisn')->join('pelajaran', 'nilai.kode_pelajaran', 'pelajaran.kode_pelajaran')->where('siswa.Nisn', $id)->get();

    	return view('nilai', ['nilai' => $data, 'siswa' => $siswa]);
    }
}
