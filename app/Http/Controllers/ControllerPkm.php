<?php

namespace App\Http\Controllers;

use App\Models\Model_Pkm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPkm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Pkm::get();
        return view('DaftarPkm.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('DaftarPkm.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_sumber' => 'required',
            'id_mitra' => 'required',
            'judul_kegiatan' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'file_proposal' => 'required',
            'file_laporan_akhir' => 'required',
            'status' => 'required'
        ]);  
        
        //fungsi eloquent untuk menambah data
        Model_Pkm::create($request->all());

        Alert::success('Data PKM Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('DaftarPkm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
