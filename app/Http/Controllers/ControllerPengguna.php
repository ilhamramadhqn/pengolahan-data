<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::get();
        return view('Data-Admin.index',compact('data'));
    }

    public function data_admin()
    {
        //
        $data = User::where('authority', 'ADMIN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data'));
    }
    public function data_dekan()
    {
        //
        $data = User::where('authority', 'DEKAN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data'));
    }
    public function data_dosen()
    {
        //
        $data = User::where('authority', 'DOSEN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data'));
    }
    public function data_mahasiswa()
    {
        //
        $data = User::where('authority', 'MAHASISWA')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jenisjurnal = Model_KategoriJurnal::get();
        return view('Jurnal.tambah', compact('jenisjurnal'));
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
            'id_jenis' => 'required',
            'nama_jurnal' => 'required',
            'penerbit_jurnal' => 'required',
            'pssn_jurnal' => 'required',
            'eissn_jurnal' => 'required',
            'link_website' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Jurnal::create($request->all());

        Alert::success('Data Jurnal Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Jurnal.index');
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
        $data = Model_Jurnal::find($id);
        $jenisjurnal = Model_KategoriJurnal::get();
        return view('Jurnal.edit', compact('data', 'jenisjurnal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jurnal)
    {
        //
        $validatedData = $request->validate([
            'id_jenis' => 'required',
            'nama_jurnal' => 'required',
            'penerbit_jurnal' => 'required',
            'pssn_jurnal' => 'required',
            'eissn_jurnal' => 'required',
            'link_website' => 'required'
        ]);
        Model_Jurnal::whereid_jurnal($id_jurnal)->update($validatedData);
        Alert::success('Data Jurnal Berhasil Diubah!');
        return redirect()->route('Jurnal.index');
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
        $data = Model_Jurnal::findOrFail($id);
        $data->delete();
        Alert::success('Data Jurnal Berhasil Dihapus!');
        return redirect()->route('Jurnal.index');
    }
}
