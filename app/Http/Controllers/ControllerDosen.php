<?php

namespace App\Http\Controllers;

use App\Models\Model_Dosen;
use App\Models\Model_Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model_Dosen::get();
        return view('MasterData/Dosen.index',compact('data'));
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
        return view('MasterData/Dosen.tambah', compact('prodi'));
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
            'kode_dosen' => 'required|min:2|max:4',
            'nidn' => 'required',
            'nama_dosen' => 'required',
            'jabfung_dosen' => 'required',
            'alamat_dosen' => 'required',
            'kota_dosen' => 'required',
            'provinsi_dosen' => 'required',
            'telp_dosen' => 'required',
            'email' => 'required|email'
        ]);  
        
        //fungsi eloquent untuk menambah data
        Model_Dosen::create($request->all());

        Alert::success('Data Dosen Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Dosen.index');
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
        $data = Model_Dosen::find($id);
        $prodi = Model_Prodi::get();
        return view('MasterData/Dosen.edit', compact('data','prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dosen)
    {
        //
        $validatedData = $request->validate([
            'id_prodi' => 'required',
            'kode_dosen' => 'required|min:2|max:4',
            'nidn' => 'required|max:10',
            'nama_dosen' => 'required',
            'jabfung_dosen' => 'required',
            'alamat_dosen' => 'required',
            'kota_dosen' => 'required',
            'provinsi_dosen' => 'required',
            'telp_dosen' => 'required',
            'email' => 'required|email'
        ]);
        Model_Dosen::whereid_dosen($id_dosen)->update($validatedData);
        Alert::success('Data Dosen Berhasil Diubah!');
        return redirect()->route('Dosen.index');
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
        $data = Model_Dosen::findOrFail($id);
        $data->delete();
        Alert::success('Data Dosen Berhasil Dihapus!');
        return redirect()->route('Dosen.index');
    }
}
