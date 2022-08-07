<?php

namespace App\Http\Controllers;

use App\Models\Model_Penelitian;
use App\Models\Model_Sumber;
use App\Models\Model_JenisPublikasi;
use App\Models\Model_Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPenelitian extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Penelitian::get();
        return view('DaftarPenelitian.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sumber = Model_Sumber::get();
        $jenispublikasi = Model_JenisPublikasi::get();
        $semester = Model_Semester::get();
        return view('DaftarPenelitian.tambah', compact('sumber', 'jenispublikasi', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add =new Model_Penelitian();
        $this->validate($request,[
            'judul_penelitian' => 'required',
            'id_sumber' => 'required',
            'id_jenis_penelitian' => 'required',
            'id_semester' => 'required',
            'tahun' => 'required',
            'file_proposal' => 'mimes:doc,docx,pdf',

        ]);

        if(!$request->file('file_proposal'))
        { 
        $file_NewName="";
        }
        else
        {
        $fileName   = $request->file('file_proposal')->getClientOriginalName();
        $fileExt   = $request->file('file_proposal')->getClientOriginalExtension();
        $file_NewName = date("Ymd")."-".$request['judul_penelitian']."." .$fileExt;
        if (is_dir('files/proposal-files/' . $request['judul_penelitian'])) { } else {
        }
        $request->file('file_proposal')->move("files/proposal-files/", $file_NewName);
        }

        $add->file_proposal=$file_NewName;
        $add->judul_penelitian=$request['judul_penelitian'];
        $add->id_sumber=$request['id_sumber'];
        $add->id_jenis_penelitian=$request['id_jenis_penelitian'];
        $add->id_semester=$request['id_semester'];
        $add->tahun=$request['tahun'];
        $add->status='P';
        $add->save();
        Alert::success('Data Penelitian Berhasil Diubah!');
        return redirect('Penelitian');
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
        $data = Model_Anggota::find($id);
        $dosen = Model_Dosen::get();
        $mahasiswa = Model_Mahasiswa::get();
        $penelitian = Model_Penelitian::get();
        return view('Anggota.edit', compact('data', 'dosen', 'mahasiswa', 'penelitian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penelitian)
    {
        //
        $validatedData = $request->validate([
            'id_dosen' => 'required',
            'id_mhs' => 'required',
            'id_penelitian' => 'required',
            'no' => 'required'
        ]);
        Model_Penelitian::whereid_penelitian($id_penelitian)->update($validatedData);
        Alert::success('Data Penelitian Berhasil Diubah!');
        return redirect()->route('Penelitian.index');
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
        $data = Model_Penelitian::findOrFail($id);
        $data->delete();
        Alert::success('Data Penelitian Berhasil Dihapus!');
        return redirect()->route('Penelitian.index');
    }
}
