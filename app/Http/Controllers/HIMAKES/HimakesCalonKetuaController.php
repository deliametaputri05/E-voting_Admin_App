<?php

namespace App\Http\Controllers\HIMAKES;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonKetuaRequest;
use App\Models\CalonKetua;
use App\Models\Jurusan;
use App\Models\Ormawa;

class HimakesCalonKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonKetua = CalonKetua::with(['ormawa', 'jurusan'])->where('id_ormawa', '=', 6)->paginate();

        return view('admin.himakes.calonKetua.index', [
            'calonKetua' => $calonKetua
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
        return view('admin.himakes.calonKetua.create', compact('ormawa', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalonKetuaRequest $request)
    {
        $data = $request->all();

        $data['id_ormawa'] = 6;
        $data['foto'] = $request->file('foto')->store('assets/himakes/calonKetua', 'public');

        CalonKetua::create($data);

        return redirect()->route('himakesCalonKetua.index');
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
        $item = CalonKetua::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.himakes.calonKetua.edit', [
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
    public function update(CalonKetuaRequest $request, $id)
    {
        $data = $request->all();
        $calonKetua = CalonKetua::findOrFail($id);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/himakes/calonKetua', 'public');
        }
        if ($request->file(null)) {
        }

        $calonKetua->update($data);

        return redirect()->route('himakesCalonKetua.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CalonKetua::findOrFail($id);
        $item->delete();

        return redirect()->route('himakesCalonKetua.index');
    }
}
