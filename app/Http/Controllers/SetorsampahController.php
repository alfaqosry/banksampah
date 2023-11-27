<?php

namespace App\Http\Controllers;

use App\Models\Sampahs;
use App\Models\User;
use App\Models\Setorsampah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SetorsampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Setor Sampah";
        $setor = Setorsampah::all();

        return view('setor.index', compact('title', 'setor'));
    }


    public function daftarPengepul(){
        $title = "Setor Sampah";
        $user = User::where('role', "Pengepul")->get();

        return view('setor.daftarpengepul', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = "Setor Sampah";
        $user = User::findOrFail($id);
        $pengepul = User::where('role' , 'Pengepul')->get();
        $sampah = Sampahs::all();
        return view('setor.create', compact('title', 'user', 'pengepul', 'sampah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sampah_id' => 'required',
            'jumlah_sampah' => 'required',
            'pengepul_id' => 'required',
           
        ]);

        $samsetor = Setorsampah::create([
            'sampah_id' => $request->sampah_id,
            'pengepul_id' => $request->pengepul_id,
            'jumlah_sampah' => $request->jumlah_sampah,

           
        ]);

        $sampah = Sampahs::findOrFail($request->sampah_id);

        $transaksi = Transaksi::create([
            'id_transaksi' => time(),
            'jenis_transaksi' => "Pemasukan",
            'status' => "Berhasil",
            'jmlh_transaksi' => $sampah->harga_dasar * $request->jumlah_sampah,
            'pengepul_id' => $request->pengepul_id,
            'petugas_id' => auth()->user()->id

           
        ]);


        return redirect()->route('setor.index')->with('sukses','Sampah Berhasil disetor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setorsampah $setorsampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setorsampah $setorsampah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setorsampah $setorsampah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setorsampah $setorsampah)
    {
        //
    }
}
