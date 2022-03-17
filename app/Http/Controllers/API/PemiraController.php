<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pemira;
use Illuminate\Http\Request;

class PemiraController extends Controller
{

    public function all(Request $request)
    {
        $id = $request->input('id');
        $id_ormawa = $request->input('id_ormawa');
        $nama = $request->input('nama');

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

        $pemira = Pemira::with(['ormawa'])->get();

        if ($nama) {
            $pemira->where('nama', 'like', '%' . $nama . '%');
        }
        if ($id_ormawa) {
            $pemira->where('id_ormawa', $id_ormawa);
        }

        return ResponseFormatter::success(
            $pemira,
            'Data list pemira berhasil diambil'
        );
    }
}
