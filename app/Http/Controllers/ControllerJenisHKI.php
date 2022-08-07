<?php

namespace App\Http\Controllers;

use App\Models\Model_JenisHKI;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerJenisHKI extends Controller
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
            $data = Model_JenisHKI::get();
            return view('MasterDataRekap/JenisHKI.index',compact('data'));
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
        return view('MasterDataRekap/JenisHKI.tambah');
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
            'nama_jenis_hki' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_JenisHKI::create($request->all());

        Alert::success('Data Jenis HKI Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Jenis-HKI.index');
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
        $data = Model_JenisHKI::find($id);
        return view('MasterDataRekap/JenisHKI.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis_hki)
    {
        //
        $validatedData = $request->validate([
            'nama_jenis_hki' => 'required'
        ]);
        Model_JenisHKI::whereid_jenis_hki($id_jenis_hki)->update($validatedData);
        Alert::success('Data Jenis HKI Berhasil Diubah!');
        return redirect()->route('Jenis-HKI.index');
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
        $data = Model_JenisHKI::findOrFail($id);
        $data->delete();
        Alert::success('Data Jenis HKI Berhasil Dihapus!');
        return redirect()->route('Jenis-HKI.index');
    }
}
