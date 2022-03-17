<?php

namespace App\Http\Controllers\API;


use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    public function all(Request $request)
    {

        $id = $request->input('id');
        $nama = $request->input('nama');
        $jenjang = $request->input('jenjang');

        if ($id) {
            $jurusan = Jurusan::find($id);

            if ($jurusan) {
                return ResponseFormatter::success(
                    $jurusan,
                    'Data Jurusan berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Jurusan tidak ada',
                    404
                );
            }
        }



        $jurusan = Jurusan::all();

        if ($nama) {
            $jurusan->where('nama', $nama);
        }
        if ($jenjang) {
            $jurusan->where('jenjang', 'like', '%' . $jenjang . '%');
        }

        return ResponseFormatter::success(
            $jurusan,
            'Data list jurusan berhasil diambil'
        );
        // return response()->json([
        //     'jurusan' => $jurusan,

        // ]);
    }
}
