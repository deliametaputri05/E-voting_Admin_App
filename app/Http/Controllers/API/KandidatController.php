<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $id_clnKetua = $request->input('id_clnKetua');
        $id_clnWakil = $request->input('id_clnWakil');
        $id_ormawa = $request->input('id_ormawa');
        $id_pemira = $request->input('pemira');

        if ($id) {
            $kandidat = Kandidat::find($id);

            if ($kandidat) {
                return ResponseFormatter::success(
                    $kandidat,
                    'Data kandidat berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Kandidat tidak ada',
                    404
                );
            }
        }

        $kandidat = Kandidat::with(['ormawa', 'pemira', 'calonKetua', 'calonWakil'])->get();

        if ($id_ormawa) {
            $kandidat->where('id_ormawa',  $id_ormawa);
        }
        if ($id_pemira) {
            $kandidat->where('id_pemira', $id_pemira);
        }
        if ($id_clnKetua) {
            $kandidat->where('id_cln$id_clnKetua', $id_clnKetua);
        }
        if ($id_clnWakil) {
            $kandidat->where('id_c$id_clnWakil', $id_clnWakil);
        }

        return ResponseFormatter::success(
            $kandidat,
            'Data list Kandidat berhasil diambil'
        );
    }
}
