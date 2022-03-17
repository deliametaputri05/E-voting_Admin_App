<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $id_jurusan = $request->input('id_jurusan');


        if ($id) {
            $mahasiswa = Mahasiswa::find($id);

            if ($mahasiswa) {
                return ResponseFormatter::success(
                    $mahasiswa,
                    'Data Mahasiswa berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Mahasiswa tidak ada',
                    404
                );
            }
        }

        $mahasiswa = Mahasiswa::with(['jurusan'])->get();

        if ($id_jurusan) {
            $mahasiswa->where('id_jurusan',  $id_jurusan);
        }


        return ResponseFormatter::success(
            $mahasiswa,
            'Data list Mahasiswa berhasil diambil'
        );
    }
}
