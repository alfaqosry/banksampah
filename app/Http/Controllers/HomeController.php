<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use App\Models\Sampahs;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::where('role', 'Pengepul')->get();
        $sampah = Sampahs::all();
        $title = "Bank Sampah";
        return view('home.index', compact('title', 'user', 'sampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   
    public function ajukanpost(Request $request){


        $this->validate($request, [
            'pengepul_id' => 'required',
            'pengguna_id' => 'required',
           
            
        ]);



        $penjemputan = Penjemputan::create([
            'pengepul_id' => $request->pengepul_id,
            'pengguna_id' => $request->pengguna_id,
            'pesan' => $request->pesan,
            'status' => "Diajukan"
           
           
        ]);

        return redirect()->route('home.index')->with('sukses','Pengajuan Penjemputan Sampah Berhasil');
    }

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
