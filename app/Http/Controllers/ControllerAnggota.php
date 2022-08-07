<?php

namespace App\Http\Controllers;

use App\Models\Model_Anggota;
use App\Models\Model_Dosen;
use App\Models\Model_Mahasiswa;
use App\Models\Model_Penelitian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerAnggota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model_Anggota::get();
        return view('Anggota.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $penelitian = Model_Penelitian::get();
        return view('Anggota.tambah', compact('dosen', 'mahasiswa', 'penelitian'));
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
            'id_mhs' => 'required',
            'id_dosen' => 'required',
            'id_penelitian' => 'required',
            'no' => 'required',
        ]);  
        
        //fungsi eloquent untuk menambah data
        Model_Anggota::create($request->all());

        Alert::success('Data Anggota Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Anggota.index');
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
        $data = Model_Anggota::find($id);
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $penelitian = Model_Penelitian::get();
        return view('Anggota.edit', compact('data', 'dosen', 'mahasiswa', 'penelitian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_anggota)
    {
        //
        $validatedData = $request->validate([
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_penelitian' => 'required',
            'no' => 'required'
        ]);
        Model_Anggota::whereid_anggota($id_anggota)->update($validatedData);
        Alert::success('Data Anggota Berhasil Diubah!');
        return redirect()->route('Anggota.index');
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
        $data = Model_Anggota::findOrFail($id);
        $data->delete();
        Alert::success('Data Anggota Berhasil Dihapus!');
        return redirect()->route('Anggota.index');
    }
}
