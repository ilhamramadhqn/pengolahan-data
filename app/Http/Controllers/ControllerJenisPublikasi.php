<?php

namespace App\Http\Controllers;

use App\Models\Model_JenisPublikasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerJenisPublikasi extends Controller
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
            $data = Model_JenisPublikasi::get();
            return view('MasterDataRekap/Jenis_Publikasi.index',compact('data'));
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
        return view('MasterDataRekap/Jenis_Publikasi.tambah');
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
            'nama_jenis_penelitian' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_JenisPublikasi::create($request->all());

        Alert::success('Data Jenis Publikasi Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Jenis-Publikasi.index');
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
        $data = Model_JenisPublikasi::find($id);
        return view('MasterDataRekap/Jenis_Publikasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis_penelitian)
    {
        //
        $validatedData = $request->validate([
            'nama_jenis_penelitian' => 'required'
        ]);
        Model_JenisPublikasi::whereid_jenis_penelitian($id_jenis_penelitian)->update($validatedData);
        Alert::success('Data Jenis Publikasi Berhasil Diubah!');
        return redirect()->route('Jenis-Publikasi.index');
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
        $data = Model_JenisPublikasi::findOrFail($id);
        $data->delete();
        Alert::success('Data Jenis Publikasi Berhasil Dihapus!');
        return redirect()->route('Jenis-Publikasi.index');
    }
}
