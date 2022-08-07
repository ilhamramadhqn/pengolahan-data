<?php

namespace App\Http\Controllers;

use App\Models\Model_Mahasiswa;
use App\Models\Model_Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model_Mahasiswa::get();
        return view('MasterData/Mahasiswa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prodi = Model_Prodi::get();
        return view('MasterData/Mahasiswa.tambah',compact('prodi'));
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
            'npm' => 'required|max:11',
            'nama_mhs' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required'
        ]);  
        
        //fungsi eloquent untuk menambah data
        Model_Mahasiswa::create($request->all());

        Alert::success('Data Mahasiswa Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Mahasiswa.index');
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
        $data = Model_Mahasiswa::find($id);
        $prodi = Model_Prodi::get();
        return view('MasterData/Mahasiswa.edit', compact('data','prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mhs)
    {
        //
        $validatedData = $request->validate([
            'id_prodi' => 'required',
            'npm' => 'required|max:11',
            'nama_mhs' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required'
        ]);
        Model_Mahasiswa::whereid_mhs($id_mhs)->update($validatedData);
        Alert::success('Data Mahasiswa Berhasil Diubah!');
        return redirect()->route('Mahasiswa.index');
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
        $data = Model_Mahasiswa::findOrFail($id);
        $data->delete();
        Alert::success('Data Mahasiswa Berhasil Dihapus!');
        return redirect()->route('Mahasiswa.index');
    }
}
