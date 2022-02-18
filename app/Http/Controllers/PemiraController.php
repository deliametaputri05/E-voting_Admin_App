<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PemiraRequest;
use App\Models\Pemira;
use Illuminate\Support\Facades\Auth;

class PemiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemira = Pemira::paginate();

        // dd($ormawa);

        return view('admin.pemira.index', [
            'pemira' => $pemira
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemira.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemiraRequest $request)
    {
        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('assets/pemira', 'public');

        Pemira::create($data);

        return redirect()->route('pemira.index');
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
    public function edit(Pemira $pemira)
    {
        return view('admin.pemira.edit', [
            'item' => $pemira
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemiraRequest $request, Pemira $pemira)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pemira', 'public');
        }
        if ($request->file(null)) {
        }

        $pemira->update($data);

        return redirect()->route('pemira.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemira $pemira)
    {
        $pemira->delete();

        return redirect()->route('pemira.index');
    }
}
