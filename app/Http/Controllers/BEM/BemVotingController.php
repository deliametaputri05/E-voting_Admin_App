<?php

namespace App\Http\Controllers\BEM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Ormawa;

class BemVotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 2)->paginate();

        return view('admin.bem.voting.index', [
            'kandidat' => $kandidat
        ]);
    }

    public function cetak()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa',  2)->paginate();
        $ormawa = Ormawa::all()->where('id', 2);
        $jumlah = Kandidat::all()->where('id_ormawa', 2)->sum('hasil_suara');
        $pemenang = Kandidat::all()->where('id_ormawa', 2)->max('hasil_suara');
        $data = Kandidat::where('hasil_suara', $pemenang)->get();

        return view('admin.bem.voting.cetak', compact('kandidat', 'ormawa', 'jumlah', 'pemenang', 'data'));
    }
}
