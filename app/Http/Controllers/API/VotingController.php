<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kandidat;
use App\Models\Mahasiswa;
use App\Models\Pemira;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    //

    public function all(Request $request)
    {

        $allJurusan = Jurusan::all();
        $allJurusanID = [];
        foreach ($allJurusan as $item) {
            $allJurusanID[] = $item['id_ormawa'];
        }

        $jurusan = Jurusan::where('id', $request->id_jurusan)->get();
        $arrayWhere = [];
        foreach ($jurusan as $item) {
            $arrayWhere[] = $item['id_ormawa'];
        }
        // dd($arrayWhere);

        $voting = Voting::with(['ormawa', 'kandidat'])->orWhereNotIn('id_ormawa', $allJurusanID)->orWhereIn('id_ormawa', $arrayWhere)->get();


        return ResponseFormatter::success(
            $voting,
            'Data list voting berhasil diambil'
        );
    }

    public function vote(Request $request)
    {
        $request->validate([
            'id_ormawa' => 'required|integer',
            'id_pemira' => 'required|integer',
            'id_mhs' => 'required|integer',
            'id_kandidat' => 'required|integer',
        ]);

        $isStarted = Pemira::where('id', $request->id_pemira)->where('tanggal', '>=', date('Y-m-d'))->where('waktu_mulai', '<=', date('H:i:s'))->where('waktu_selesai', '>=', date('H:i:s'))->first();

        if (!$isStarted) {
            return ResponseFormatter::error(
                'Pemira belum dimulai/pemira sudah berakhir',
                'Pemira belum dimulai/pemira sudah berakhir',
                201
            );
        }

        if (Voting::where('id_ormawa', $request->id_ormawa)->where('id_mhs', $request->id_mhs)->exists()) {
            return ResponseFormatter::error('Voting sudah pernah dilakukan','Voting sudah pernah dilakukan', 201);
        }

        $vote = Voting::create([
            'id_ormawa' => $request->id_ormawa,
            'id_mhs' => $request->id_mhs,
            'id_pemira' => $request->id_pemira,
            'id_kandidat' => $request->id_kandidat,
            'status' => 'sudah vote',
        ]);

        $kandidat = Kandidat::find($request->id_kandidat);
        $kandidat = Kandidat::where('id', $request->id_kandidat)->update([
            'jumlah_suara' => $kandidat->jumlah_suara + 1
        ]);
        $mhs = Mahasiswa::find($request->id_mhs);
        $mhs = Mahasiswa::where('id', $request->id_mhs)->update(['sudah_vote' => $mhs->sudah_vote + 1]);

        $vote = Voting::with(['kandidat', 'mahasiswa', 'ormawa', 'pemira'])->where('id_kandidat', $vote->id_kandidat)->first();
        // dd($vote);
        return ResponseFormatter::success($vote, 'Berhasil');
    }
}
