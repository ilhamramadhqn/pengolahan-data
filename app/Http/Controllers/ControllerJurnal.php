<?php

namespace App\Http\Controllers;

use App\Models\Model_Jurnal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerJurnal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Jurnal::get();
        return view('Jurnal.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Jurnal.tambah');
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
            'id_jurnal' => 'required',
            'id_penelitian' => 'required',
            'id_semester' => 'required',
            'volume' => 'required',
            'no_jurnal' => 'required',
            'tanggal' => 'required',
            'judul_Jurnal' => 'required',
            'link' => 'required',
            'file_Jurnal' => 'required',
            'status' => 'required'
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
