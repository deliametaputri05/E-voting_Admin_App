<?php

namespace App\Http\Controllers\HIMATIF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class HimatifVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 3)->paginate();

        return view('admin.himatif.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  3)->paginate();
        $ormawa = Ormawa::all()->where('id', 3);
        $jumlah = Kandidat::all()->where('id_ormawa', 3)->sum('jumlah_suara');
        $pemenang = Kandidat::all()->where('id_ormawa', 3)->max('jumlah_suara');
        $data = Kandidat::where('jumlah_suara', $pemenang)->get();
        // dd($data);

        return view('admin.himatif.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
