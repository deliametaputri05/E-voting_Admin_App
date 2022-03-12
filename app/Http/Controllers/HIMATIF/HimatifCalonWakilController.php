<?php

namespace App\Http\Controllers\HIMATIF;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonWakilRequest;
use App\Models\CalonWakil;
use App\Models\Jurusan;
use App\Models\Ormawa;

class HimatifCalonWakilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonWakil = CalonWakil::with(['ormawa', 'jurusan'])->where('id_ormawa', '=', 3)->paginate();

        return view('admin.himatif.calonWakil.index', [
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
        return view('admin.himatif.calonWakil.create', compact('ormawa', 'jurusan'));
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

        $data['id_ormawa'] = 3;
        $data['foto'] = $request->file('foto')->store('assets/himatif/calonWakil', 'public');

        CalonWakil::create($data);

        return redirect()->route('himatifCalonWakil.index');
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
        $item = CalonWakil::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.himatif.calonWakil.edit', [
            'id' => $id,
            'jurusan' => $jurusan,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalonWakilRequest $request, $id)
    {
        $data = $request->all();
        $calonWakil = CalonWakil::findOrFail($id);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/himatif/calonWakil', 'public');
        }
        if ($request->file(null)) {
        }

        $calonWakil->update($data);

        return redirect()->route('himatifCalonWakil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CalonWakil::findOrFail($id);
        $item->delete();

        return redirect()->route('himatifCalonWakil.index');
    }
}
