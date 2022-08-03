<?php

namespace App\Http\Controllers;

use App\Models\Model_Dosen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model_Dosen::get();
        return view('MasterData/Dosen.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MasterData/Dosen.tambah');
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
            'id_prodi' => 'required',
            'kode_dosen' => 'required',
            'nidn' => 'required',
            'nama_dosen' => 'required',
            'jabfung_dosen' => 'required',
            'alamat_dosen' => 'required',
            'kota_dosen' => 'required',
            'provinsi_dosen' => 'required',
            'telp_dosen' => 'required',
            'email' => 'required',
        ]);  
        
        //fungsi eloquent untuk menambah data
        Model_Dosen::create($request->all());

        Alert::success('Data Dosen Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Dosen.index');
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
