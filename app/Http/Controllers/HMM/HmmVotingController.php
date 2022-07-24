<?php

namespace App\Http\Controllers\HMM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class HmmVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 4)->paginate();

        return view('admin.hmm.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  4)->paginate();
        $ormawa = Ormawa::all()->where('id', 4);
        $jumlah = Kandidat::all()->where('id_ormawa', 4)->sum('jumlah_suara');
        $pemenang = Kandidat::all()->where('id_ormawa', 4)->max('jumlah_suara');
        $data = Kandidat::where('jumlah_suara', $pemenang)->get();
        // dd($data);

        return view('admin.hmm.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
