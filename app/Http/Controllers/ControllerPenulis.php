<?php

namespace App\Http\Controllers;

use App\Models\Model_Penulis;
use App\Models\Model_Dosen;
use App\Models\Model_Mahasiswa;
use App\Models\Model_Artikel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPenulis extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            //
            $data = Model_Penulis::get();
            return view('MasterDataRekap/Penulis.index',compact('data'));
        }
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
        $artikel = Model_Artikel::get();
        return view('MasterDataRekap/Penulis.tambah', compact('dosen', 'mahasiswa', 'artikel'));
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
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_artikel' => 'required',
            'no' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Penulis::create($request->all());

        Alert::success('Data Penulis Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Penulis.index');
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
        $data = Model_Penulis::find($id);
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $artikel = Model_Artikel::get();
        return view('MasterDataRekap/Penulis.edit', compact('data', 'dosen', 'mahasiswa', 'artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penulis)
    {
        //
        $validatedData = $request->validate([
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_artikel' => 'required',
            'no' => 'required'
        ]);
        Model_Penulis::whereid_penulis($id_penulis)->update($validatedData);
        Alert::success('Data Pelaksana Berhasil Diubah!');
        return redirect()->route('Penulis.index');
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
        $data = Model_Penulis::findOrFail($id);
        $data->delete();
        Alert::success('Data Penulis Berhasil Dihapus!');
        return redirect()->route('Penulis.index');
    }
}
