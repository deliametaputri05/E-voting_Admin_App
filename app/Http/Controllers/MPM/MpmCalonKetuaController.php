<?php

namespace App\Http\Controllers\MPM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonKetuaRequest;
use App\Models\CalonKetua;
use App\Models\Jurusan;
use App\Models\Ormawa;

class MpmCalonKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonKetua = CalonKetua::with(['ormawa', 'jurusan'])->where('id_ormawa', '=', 1)->paginate();

        return view('admin.mpm.calonKetua.index', [
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
        return view('admin.mpm.calonKetua.create', compact('ormawa', 'jurusan'));
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

        $data['id_ormawa'] = 1;
        $data['foto'] = $request->file('foto')->store('assets/mpm/calonKetua', 'public');

        CalonKetua::create($data);

        return redirect()->route('calonKetua.index');
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
    public function edit(CalonKetua $calonKetua)
    {
        $jurusan = Jurusan::all();
        return view('admin.mpm.calonKetua.edit', [
            'item' => $calonKetua,
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
    public function update(CalonKetuaRequest $request, CalonKetua $calonKetua)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/mpm/calonKetua', 'public');
        }
        if ($request->file(null)) {
        }

        $calonKetua->update($data);

        return redirect()->route('calonKetua.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalonKetua $calonKetua)
    {
        $calonKetua->delete();

        return redirect()->route('mpm.calonKetua.index');
    }
}
