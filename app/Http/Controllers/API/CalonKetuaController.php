<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CalonKetua;
use Illuminate\Http\Request;

class CalonKetuaController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $id_jurusan = $request->input('id_jurusan');
        $id_ormawa = $request->input('id_ormawa');

        if ($id) {
            $calonKetua = CalonKetua::find($id);

            if ($calonKetua) {
                return ResponseFormatter::success(
                    $calonKetua,
                    'Data calonKetua berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data calon Ketua tidak ada',
                    404
                );
            }
        }

        $calonKetua = CalonKetua::with(['ormawa', 'jurusan'])->where($id_jurusan, $id_ormawa)->get();

        if ($id_jurusan) {
            $calonKetua->where('id_jurusan',  $id_jurusan);
        }
        if ($id_ormawa) {
            $calonKetua->where('id_ormawa', $id_ormawa);
        }

        return ResponseFormatter::success(
            $calonKetua,
            'Data list Calon Ketua berhasil diambil'
        );
    }
}
