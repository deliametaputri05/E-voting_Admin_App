<?php

namespace App\Http\Controllers\MPM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class MpmVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 1)->paginate();

        return view('admin.mpm.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  1)->paginate();
        $ormawa = Ormawa::all()->where('id', 1);
        $jumlah = Kandidat::all()->where('id_ormawa', 1)->sum('jumlah_suara');
        $pemenang = $kandidat->where('id_ormawa', 1)->max('jumlah_suara');
        $data = $kandidat->where('jumlah_suara', $pemenang);
        // dd($data);

        return view('admin.mpm.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
