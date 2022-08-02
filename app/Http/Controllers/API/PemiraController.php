<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Pemira;
use Illuminate\Http\Request;

class PemiraController extends Controller
{

    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $pemira = Pemira::find($id);

            if ($pemira) {
                return ResponseFormatter::success(
                    $pemira,
                    'Data Pemira berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Pemira tidak ada',
                    404
                );
            }
        }
        $allJurusan = Jurusan::all();
        $allJurusanID = [];
        foreach ($allJurusan as $item) {
            $allJurusanID[] = $item['id_ormawa'];
        }
        // dd($allJurusanID);

        // dd($pemira);
        $jurusan = Jurusan::where('id', $request->id_jurusan)->get();
        $arrayWhere = [];


        foreach ($jurusan as $item) {
            $arrayWhere[] = $item['id_ormawa'];
        }

        // dd($arrayWhere); 
        // $pemira = Pemira::with(['ormawa'])->get();
        $pemira = Pemira::with(['ormawa', 'voting' => function ($q) use ($request) {
            return $q->where('id_mhs', $request->id_mhs);
        }])->orWhereNotIn('id_ormawa', $allJurusanID)->orWhereIn('id_ormawa', $arrayWhere)->get();


        return ResponseFormatter::success(
            $pemira,
            'Data list pemira berhasil diambil'
        );
    }
}
