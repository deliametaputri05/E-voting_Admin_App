<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ormawa;
use Illuminate\Http\Request;

class OrmawaController extends Controller
{
    public function all(Request $request)
    {

        $id = $request->input('id');
        $nama = $request->input('nama');
        $logo = $request->input('logo');

        if ($id) {
            $ormawa = Ormawa::find($id);

            if ($ormawa) {
                return ResponseFormatter::success(
                    $ormawa,
                    'Data Ormawa berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Ormawa tidak ada',
                    404
                );
            }
        }



        $ormawa = Ormawa::get();
        // $res = $ormawa->find($id);

        if ($nama) {
            $ormawa->where('nama', 'like', '%' . $nama . '%');
        }
        if ($logo) {
            $ormawa->where('logo', $logo);
        }

        return ResponseFormatter::success(
            $ormawa,
            'Data list ormawa berhasil diambil'
        );
        // return response()->json([
        //     'jurusan' => $jurusan,

        // ]);
    }
}
