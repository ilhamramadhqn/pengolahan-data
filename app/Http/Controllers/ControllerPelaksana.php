<?php

namespace App\Http\Controllers;

use App\Models\Model_Pelaksana;
use App\Models\Model_Dosen;
use App\Models\Model_Mahasiswa;
use App\Models\Model_Pkm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPelaksana extends Controller
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
            $data = Model_Pelaksana::get();
            return view('MasterDataRekap/Pelaksana.index',compact('data'));
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
        $pkm = Model_Pkm::get();
        return view('MasterDataRekap/Pelaksana.tambah', compact('dosen', 'mahasiswa', 'pkm'));
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
            'id_pkm' => 'required',
            'no' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Pelaksana::create($request->all());

        Alert::success('Data Pelaksana Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Pelaksana.index');
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
        $data = Model_Pelaksana::find($id);
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $pkm = Model_Pkm::get();
        return view('MasterDataRekap/Pelaksana.edit', compact('data', 'dosen', 'mahasiswa', 'pkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelaksana)
    {
        //
        $validatedData = $request->validate([
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_pkm' => 'required',
            'no' => 'required'
        ]);
        Model_Pelaksana::whereid_pelaksana($id_pelaksana)->update($validatedData);
        Alert::success('Data Pelaksana Berhasil Diubah!');
        return redirect()->route('Pelaksana.index');
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
        $data = Model_Pelaksana::findOrFail($id);
        $data->delete();
        Alert::success('Data Pelaksana Berhasil Dihapus!');
        return redirect()->route('Pelaksana.index');
    }
}
