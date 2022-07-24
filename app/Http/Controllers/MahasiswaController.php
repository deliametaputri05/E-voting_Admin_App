<?php

namespace App\Http\Controllers;


use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['jurusan'])->paginate(100);

        return view('admin.mahasiswa.index', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.mahasiswa.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {

        $data = $request->all();
        $filename = $data['nim'];
        // dd($data['nim']);

        $data['foto'] = $request->file('foto')->storeAs('public/static/face', $filename . '.jpg');
        $data['sudah_vote'] = 0;


        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusan = Jurusan::all();
        return view('admin.mahasiswa.edit', [
            'item' => $mahasiswa,
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
    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $data = $request->all();
        $filename = $data['nim'];

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->storeAs('public/static/face', $filename . '.jpg');
        }
        if ($request->file(null)) {
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        Storage::delete('public/static/face/' . $mahasiswa->nim . '.jpg');

        return redirect()->route('mahasiswa.index');
    }
}
