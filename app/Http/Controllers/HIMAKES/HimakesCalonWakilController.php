<?php

namespace App\Http\Controllers\HIMAKES;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonWakilRequest;
use App\Models\CalonWakil;
use App\Models\Jurusan;
use App\Models\Ormawa;

class HimakesCalonWakilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonWakil = CalonWakil::with(['ormawa', 'jurusan'])->where('id_ormawa', '=', 6)->paginate();

        return view('admin.himakes.calonWakil.index', [
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
        $jurusan = Jurusan::all()->where('id_ormawa', 6);
        return view('admin.himakes.calonWakil.create', compact('ormawa', 'jurusan'));
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

        $data['id_ormawa'] = 6;
        $data['foto'] = $request->file('foto')->store('assets/himakes/calonWakil', 'public');

        CalonWakil::create($data);

        return redirect()->route('himakesCalonWakil.index');
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
        $jurusan = Jurusan::all()->where('id_ormawa', 6);
        return view('admin.himakes.calonWakil.edit', [
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
            $data['foto'] = $request->file('foto')->store('assets/himakes/calonWakil', 'public');
        }
        if ($request->file(null)) {
        }

        $calonWakil->update($data);

        return redirect()->route('himakesCalonWakil.index');
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

        return redirect()->route('himakesCalonWakil.index');
    }
}
