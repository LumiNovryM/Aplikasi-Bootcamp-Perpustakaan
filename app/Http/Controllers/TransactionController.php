<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // public function index_siswa()
    // {
    //     return view('index_siswa');
    // }

    public function index_get_siswa()
    {
        $authId = Auth::id();

        $siswa = Siswa::with('transaksis.buku')
            ->where('id', $authId)
            ->first();

        $trx = $siswa
            ->transaksis()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index_siswa', compact('trx'));
    }

    public function pinjam_buku_view()
    {
        $authId = Auth::id();

        $siswa = Siswa::find($authId);

        $buku = Buku::all();

        return view('panel_pinjam_siswa', compact('buku', 'siswa'));
    }

    public function store(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($id, $request) {
                $buku = Buku::find($id);

                if ($buku && $buku->stok_buku > 0) {
                    $buku->update(['stok_buku' => $buku->stok_buku - 1]);
                    $buku->touch();
                    Transaksi::create([
                        'siswa_id' => $request->siswa_id,
                        'buku_id' => $request->buku_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    throw new \Exception('Buku tidak tersedia atau stok habis');
                }
            });

            return redirect()->route('dashboard_siswa')->with('success', 'Buku berhasil dipinjam');
        } catch (\Exception $e) {

            return redirect()->route('dashboard_siswa')->with('error', $e->getMessage());
        }
    }
}
