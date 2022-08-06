<?php

namespace App\Http\Controllers;

use App\Models\Model_KategoriJurnal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerKategoriJurnal extends Controller
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
            $data = Model_KategoriJurnal::get();
            return view('MasterDataRekap/Jenis_Jurnal.index',compact('data'));
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
        return view('MasterDataRekap/Jenis_Jurnal.tambah');
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
            'nama_jenis' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_KategoriJurnal::create($request->all());

        Alert::success('Data Jenis Jurnal Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Jenis-Jurnal.index');
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
        $data = Model_KategoriJurnal::find($id);
        return view('MasterDataRekap/Jenis_Jurnal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis)
    {
        //
        $validatedData = $request->validate([
            'nama_jenis' => 'required'
        ]);
        Model_KategoriJurnal::whereid_jenis($id_jenis)->update($validatedData);
        Alert::success('Data Jenis Jurnal Berhasil Diubah!');
        return redirect()->route('Jenis-Jurnal.index');
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
        $data = Model_KategoriJurnal::findOrFail($id);
        $data->delete();
        Alert::success('Data Jenis Jurnal Berhasil Dihapus!');
        return redirect()->route('Jenis-Jurnal.index');
    }
}
