<?php

namespace App\Http\Controllers;

use App\Models\Model_Prodi;
use App\Models\Model_Fakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerProdi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Prodi::get();
        return view('MasterDataRekap/Prodi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fakultas = Model_Fakultas::get();
        return view('MasterDataRekap/Prodi.tambah',compact('fakultas'));
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
            'kode_prodi' => 'required|min:2|max:4',
            'nama_prodi' => 'required',
            'id_fakultas' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Prodi::create($request->all());

        Alert::success('Data Program Studi Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Program-Studi.index');
    
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
        $data = Model_Prodi::find($id);
        $fakultas = Model_Fakultas::get();
        return view('MasterDataRekap/Prodi.edit', compact('data','fakultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prodi)
    {
        //
        $validatedData = $request->validate([
            'kode_prodi' => 'required|min:2|max:4',
            'nama_prodi' => 'required',
            'id_fakultas' => 'required'
        ]);
        Model_Prodi::whereid_prodi($id_prodi)->update($validatedData);
        Alert::success('Data Prodi Berhasil Diubah!');
        return redirect()->route('Program-Studi.index');
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
        $data = Model_Prodi::findOrFail($id);
        $data->delete();
        Alert::success('Data Prodi Berhasil Dihapus!');
        return redirect()->route('Program-Studi.index');
    }
}
