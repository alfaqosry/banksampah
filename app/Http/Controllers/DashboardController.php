<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penjemputan;
use App\Models\Setorsampah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Dashboard";
        $totalsampah = Setorsampah::selectRaw('sum(jumlah_sampah) as total')->where('pengepul_id', auth()->user()->id)->first();

        $saldomasuk = Transaksi::selectRaw('sum(jmlh_transaksi) as saldo')->where('pengepul_id', auth()->user()->id)->where('jenis_transaksi', 'Pemasukan')->first();
        $saldokeluar = Transaksi::selectRaw('sum(jmlh_transaksi) as saldo')->where('pengepul_id', auth()->user()->id)->where('jenis_transaksi', 'Pengeluaran')->first();
        $saldo = $saldomasuk->saldo - $saldokeluar->saldo;
        $penjemputan = Penjemputan::join('users', 'penjemputans.pengguna_id', 'users.id')->where('pengepul_id', auth()->user()->id)->get();
        return view('dashboard.index', compact('title','penjemputan', 'saldo', 'totalsampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
