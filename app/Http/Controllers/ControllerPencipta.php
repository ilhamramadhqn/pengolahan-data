<?php

namespace App\Http\Controllers;

use App\Models\Model_Pencipta;
use App\Models\Model_HKI;
use App\Models\Model_Dosen;
use App\Models\Model_Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPencipta extends Controller
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
            $data = Model_Pencipta::get();
            return view('MasterDataRekap/Pencipta.index',compact('data'));
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
        $hki = Model_HKI::get();
        return view('MasterDataRekap/Pencipta.tambah', compact('dosen', 'mahasiswa', 'hki'));
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
            'id_hki' => 'required',
            'no' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Pencipta::create($request->all());

        Alert::success('Data Pencipta Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Pencipta.index');
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
        $data = Model_Pencipta::find($id);
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $hki = Model_HKI::get();
        return view('MasterDataRekap/Pencipta.edit', compact('data', 'dosen', 'mahasiswa', 'hki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pencipta)
    {
        //
        $validatedData = $request->validate([
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_hki' => 'required',
            'no' => 'required'
        ]);
        Model_Pencipta::whereid_pencipta($id_pencipta)->update($validatedData);
        Alert::success('Data Pencipta Berhasil Diubah!');
        return redirect()->route('Pencipta.index');
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
        $data = Model_Pencipta::findOrFail($id);
        $data->delete();
        Alert::success('Data Pencipta Berhasil Dihapus!');
        return redirect()->route('Pencipta.index');
    }
}
