<?php

namespace App\Http\Controllers\MPM;

use App\Http\Controllers\Controller;
use App\Http\Requests\KandidatRequest;
use App\Models\CalonKetua;
use App\Models\CalonWakil;
use App\Models\Kandidat;
use App\Models\Pemira;
use App\Models\Ormawa;

class MpmKandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->where('id_ormawa', '=', 1)->paginate();

        return view('admin.mpm.kandidat.index', [
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ormawa = Ormawa::all();
        $pemira = Pemira::all();
        $calonKetua = CalonKetua::all()->where('id_ormawa', '=', 1);
        $calonWakil = CalonWakil::all()->where('id_ormawa', '=', 1);
        return view('admin.mpm.kandidat.create', compact('ormawa', 'pemira', 'calonKetua', 'calonWakil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KandidatRequest $request)
    {
        $data = $request->all();

        $data['id_ormawa'] = 1;
        $data['id_pemira'] = 1;
        $data['foto'] = $request->file('foto')->store('assets/mpm/kandidat', 'public');

        Kandidat::create($data);

        return redirect()->route('mpmKandidat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $calonKetua = CalonKetua::where('id_ormawa', '=', 1);
        $calonWakil = CalonWakil::where('id_ormawa', '=', 1);
        return view('admin.mpm.kandidat.edit', [
            'id' => $id,
            'item' => $kandidat,
            'calonKetua' => $calonKetua,
            'calonWakil' => $calonWakil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KandidatRequest $request, $id)
    {
        $data = $request->all();
        $kandidat = Kandidat::findOrFail($id);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/mpm/kandidat', 'public');
        }
        if ($request->file(null)) {
        }

        $kandidat->update($data);

        return redirect()->route('mpmKandidat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat->delete();


        return redirect()->route('mpmKandidat.index');
    }
}
