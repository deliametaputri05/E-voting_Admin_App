<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CalonWakil;
use Illuminate\Http\Request;

class CalonWakilController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $id_jurusan = $request->input('id_jurusan');
        $id_ormawa = $request->input('id_ormawa');

        if ($id) {
            $calonWakil = CalonWakil::find($id);

            if ($calonWakil) {
                return ResponseFormatter::success(
                    $calonWakil,
                    'Data Calon Wakil berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Calon Wakil tidak ada',
                    404
                );
            }
        }

        $calonWakil = CalonWakil::with(['ormawa', 'jurusan'])->where($id_jurusan, $id_ormawa)->get();

        if ($id_jurusan) {
            $calonWakil->where('id_jurusan',  $id_jurusan);
        }
        if ($id_ormawa) {
            $calonWakil->where('id_ormawa', $id_ormawa);
        }

        return ResponseFormatter::success(
            $calonWakil,
            'Data list Calon Wakil berhasil diambil'
        );
    }
}
