<?php

namespace App\Http\Controllers\MPM;

use App\Http\Controllers\Controller;
use App\Http\Requests\KandidatRequest;
use App\Models\Kandidat;
use App\Models\Ormawa;
use App\Models\Pemira;
use \PDF;

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
        $pemenang = Kandidat::all()->where('id_ormawa', 1)->max('jumlah_suara');
        $data = Kandidat::where('jumlah_suara', $pemenang)->get();
        // dd($data);


        return view('admin.mpm.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
