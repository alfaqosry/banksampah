<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Penjemputan";
        $penjemputan = Penjemputan::join('users', 'penjemputans.pengguna_id', 'users.id')->where('pengepul_id', auth()->user()->id)->select('users.nama', 'users.no_tlpn', 'users.email', 'users.alamat', 'penjemputans.pesan', 'penjemputans.status', 'penjemputans.id', 'penjemputans.created_at')->get();
        return view('penjemputan.index', compact('penjemputan', 'title'));
    }


    public function terima($id)
    {
        $title = "Penjemputan";
        DB::table('penjemputans')
            ->where('id', $id)
            ->update(['status' => "Dalam Penjemputan"]);

        return redirect()->route('penjemputan.index')->with('sukses', 'Penjemputan berhasil diterima');
    }

    public function tolak($id)
    {
        $title = "Penjemputan";
        DB::table('penjemputans')
            ->where('id', $id)
            ->update(['status' => "Ditolak"]);

        return redirect()->route('penjemputan.index')->with('sukses', 'Penjemputan berhasil tolak');
    }

    public function riwayatpenjemputan()
    {
        $title = "Riwayat Penjemputan";
        $penjemputan = Penjemputan::join('users', 'penjemputans.pengepul_id', 'users.id')->where('pengguna_id', auth()->user()->id)->select('users.nama', 'users.no_tlpn', 'users.email', 'users.alamat', 'penjemputans.pesan', 'penjemputans.status', 'penjemputans.id', 'penjemputans.created_at')->get();

        return view('penjemputan.riwayat', compact('penjemputan', 'title'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
