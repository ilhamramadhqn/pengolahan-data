<?php

namespace App\Http\Controllers;

use App\Models\Model_Mitra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerMitra extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Mitra::get();
        return view('MasterData/Mitra.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MasterData/Mitra.tambah');
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
            'nama_mitra' => 'required',
            'alamat_mitra' => 'required',
            'kota_mitra' => 'required',
            'provinsi_mitra' => 'required',
            'pic_mitra' => 'required',
            'telepon_mitra' => 'required',
            'email_mitra' => 'required|email',
        ]);

        //fungsi eloquent untuk menambah data
        Model_Mitra::create($request->all());

        Alert::success('Data Mitra Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Mitra.index');
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
        $data = Model_Mitra::find($id);
        return view('MasterData/Mitra.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mitra)
    {
        //
        $validatedData = $request->validate([
            'nama_mitra' => 'required',
            'alamat_mitra' => 'required',
            'kota_mitra' => 'required',
            'provinsi_mitra' => 'required',
            'pic_mitra' => 'required',
            'telepon_mitra' => 'required',
            'email_mitra' => 'required|email',
        ]);
        Model_Mitra::whereid_mitra($id_mitra)->update($validatedData);
        Alert::success('Data Mitra Berhasil Diubah!');
        return redirect()->route('Mitra.index');
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
        $data = Model_Mitra::findOrFail($id);
        $data->delete();
        Alert::success('Data Mitra Berhasil Dihapus!');
        return redirect()->route('Mitra.index');
    }
}
