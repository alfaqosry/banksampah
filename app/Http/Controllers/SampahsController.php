<?php

namespace App\Http\Controllers;

use App\Models\Sampahs;
use Illuminate\Http\Request;

class SampahsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Sampah";
        $sampah = Sampahs::all();
        return view('sampah.index', compact('sampah', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Sampah";
        return view('sampah.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sampah' => 'required',
            'jenis_sampah' => 'required',
            'satuan' => 'required',
            'harga_dasar' => 'required',
            'harga_jual' => 'required',
            
            
        ]);

    

        $sampah = $request->all();
        $sampah['foto'] = $request->file('foto')->store('foto', 'public');
        Sampahs::create($sampah);

        return redirect()->route('sampah')->with('sukses','Data sampah berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampahs $sampahs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sampah = Sampahs::find($id);
        $title = "Sampah";
        return view('sampah.edit', compact('sampah', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $sampah = Sampahs::find($id);
        $sampah->nama_sampah = $request->nama_sampah;
        $sampah->jenis_sampah = $request->jenis_sampah;
        $sampah->satuan = $request->satuan;
        $sampah->harga_dasar = $request->harga_dasar;
        $sampah->harga_jual = $request->harga_jual;
        if($request->foto){
            $sampah['foto'] = $request->file('foto')->store('foto', 'public');
        }
      
        $sampah->save();



        return redirect()->route('sampah',)->with('sukses', 'Sampah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sampahs $sampahs)
    {
        //
    }
}
