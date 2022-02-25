<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalonKetuaRequest;
use App\Models\CalonKetua;

class CalonKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonKetua = CalonKetua::paginate();

        return view('admin.calonKetua.index', [
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
        return view('admin.ormawa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrmawaRequest $request)
    {
        $data = $request->all();

        $data['logo'] = $request->file('logo')->store('assets/ormawa', 'public');

        Ormawa::create($data);

        return redirect()->route('ormawa.index');
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
    public function edit(Ormawa $ormawa)
    {
        return view('admin.ormawa.edit', [
            'item' => $ormawa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrmawaRequest $request, Ormawa $ormawa)
    {
        $data = $request->all();

        if ($request->file('logo')) {
            $data['logo'] = $request->file('logo')->store('assets/ormawa', 'public');
        }
        if ($request->file(null)) {
        }

        $ormawa->update($data);

        return redirect()->route('ormawa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ormawa $ormawa)
    {
        $ormawa->delete();

        return redirect()->route('ormawa.index');
    }
}
