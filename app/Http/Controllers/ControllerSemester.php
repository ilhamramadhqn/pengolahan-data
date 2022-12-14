<?php

namespace App\Http\Controllers;

use App\Models\Model_Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerSemester extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model_Semester::get();
        return view('MasterDataRekap/Semester.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MasterDataRekap/Semester.tambah');
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
        $add =new Model_Semester();
        $request->validate([
            'tipe_sem' => 'required',
            'tahun' => 'required'
        ]);  
        
        $add->nama_semester=$request['tipe_sem']." ".$request['tahun'];
        $add->save();
        Alert::success('Semester Baru Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Semester.index');
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
        $data = Model_Semester::find($id);
        return view('MasterDataRekap/Semester.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_semester)
    {
        //
        $this->validate($request,[
            'tipe_sem' => 'required',
            'tahun' => 'required'
          ]);
        $update =Model_Semester::where('id_semester',$id_semester)->first();
        
        $update->nama_semester=$request['tipe_sem']." ".$request['tahun'];
        $update->update();
        Alert::success('Data Semester Berhasil Diubah!');
        return redirect()->route('Semester.index');
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
        $data = Model_Semester::findOrFail($id);
        $data->delete();
        Alert::success('Data Semester Berhasil Dihapus!');
        return redirect()->route('Semester.index');
    }
}
