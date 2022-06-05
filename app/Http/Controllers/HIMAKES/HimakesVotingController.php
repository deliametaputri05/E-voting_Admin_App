<?php

namespace App\Http\Controllers\HIMAKES;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class HimakesVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 6)->paginate();

        return view('admin.himakes.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  6)->paginate();
        $ormawa = Ormawa::all()->where('id', 6);
        $jumlah = Kandidat::all()->where('id_ormawa', 6)->sum('hasil_suara');
        $pemenang = Kandidat::all()->where('id_ormawa', 6)->max('hasil_suara');
        $data = Kandidat::where('hasil_suara', $pemenang)->get();
        // dd($data);

        return view('admin.himakes.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
