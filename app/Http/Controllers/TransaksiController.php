<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $title = "Transaksi";
      $saldomasuk = Transaksi::selectRaw('sum(jmlh_transaksi) as saldo')->where('pengepul_id', auth()->user()->id)->where('jenis_transaksi', 'Pemasukan')->first();
      $saldokeluar = Transaksi::selectRaw('sum(jmlh_transaksi) as saldo')->where('pengepul_id', auth()->user()->id)->where('jenis_transaksi', 'Pengeluaran')->first();
      $saldo = $saldomasuk->saldo - $saldokeluar->saldo;
      $transaksi = Transaksi::where('pengepul_id', auth()->user()->id)->get();
      return view('transaksi.index', compact('transaksi', 'title','saldo'));
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
