<?php

namespace App\Http\Controllers\BEM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonWakilRequest;
use App\Models\CalonWakil;
use App\Models\Jurusan;
use App\Models\Ormawa;

class BemCalonWakilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonWakil = CalonWakil::with(['ormawa', 'jurusan'])->where('id_ormawa', '=', 2)->paginate();

        return view('admin.bem.calonWakil.index', [
            'calonWakil' => $calonWakil
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
        $jurusan = Jurusan::all();
        return view('admin.bem.calonWakil.create', compact('ormawa', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalonWakilRequest $request)
    {
        $data = $request->all();

        $data['id_ormawa'] = 2;
        $data['foto'] = $request->file('foto')->store('assets/bem/calonWakil', 'public');

        CalonWakil::create($data);

        return redirect()->route('calonWakilBem.index');
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
    public function edit(CalonWakil $calonWakil)
    {
        $jurusan = Jurusan::all();
        return view('admin.bem.calonWakil.edit', [
            'item' => $calonWakil,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalonWakilRequest $request, CalonWakil $calonWakil)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/bem/calonWakil', 'public');
        }
        if ($request->file(null)) {
        }

        $calonWakil->update($data);

        return redirect()->route('calonWakilBem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalonWakil $calonWakil)
    {
        $calonWakil->delete();

        return redirect()->route('bem.calonWakil.index');
    }
}
