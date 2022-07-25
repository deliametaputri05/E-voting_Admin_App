<?php

namespace App\Http\Controllers\HIMRA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class HimraVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 5)->paginate();

        return view('admin.himra.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  5)->paginate();
        $ormawa = Ormawa::all()->where('id', 5);
        $jumlah = Kandidat::all()->where('id_ormawa', 5)->sum('jumlah_suara');
        $pemenang = $kandidat->where('id_ormawa', 5)->max('jumlah_suara');
        $data = $kandidat->where('jumlah_suara', $pemenang)->get();
        // dd($data);

        return view('admin.himra.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
