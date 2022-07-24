<?php

namespace App\Http\Controllers;


use App\Models\Kandidat;
use App\Models\Ormawa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $ormawa = Ormawa::all();
        $mpm = Kandidat::all()->where('id_ormawa', 1)->sum('jumlah_suara');
        $bem = Kandidat::all()->where('id_ormawa', 2)->sum('jumlah_suara');
        $himatif = Kandidat::all()->where('id_ormawa', 3)->sum('jumlah_suara');
        $hmm = Kandidat::all()->where('id_ormawa', 4)->sum('jumlah_suara');
        $himra = Kandidat::all()->where('id_ormawa', 5)->sum('jumlah_suara');
        $himakes = Kandidat::all()->where('id_ormawa', 6)->sum('jumlah_suara');

        return view('admin.index', compact('mpm', 'bem', 'himatif', 'hmm', 'himra', 'himakes'));
    }
}
