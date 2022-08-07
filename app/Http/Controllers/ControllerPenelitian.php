<?php

namespace App\Http\Controllers;

use App\Models\Model_Penelitian;
use App\Models\Model_Sumber;
use App\Models\Model_JenisPublikasi;
use App\Models\Model_Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //
        $add =new Model_Penelitian();
        $request->validate([
            'id_sumber' => 'required',
            'id_jenis_penelitian' => 'required',
            'id_semester' => 'required',
            'judul_penelitian' => 'required',
            'tahun' => 'required',
            'file_proposal' => 'mimes:doc,docx,pdf',
            'file_laporan_akhir' => 'mimes:doc,docx,pdf',
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
        
        if(!$request->file('file_laporan_akhir'))
        { 
        $file2_NewName="";
        }
        else
        {
        $file2Name   = $request->file('file_laporan_akhir')->getClientOriginalName();
        $file2Ext   = $request->file('file_laporan_akhir')->getClientOriginalExtension();
        $file2_NewName = date("Ymd")."-".$request['judul_penelitian']."." .$file2Ext;
        if (is_dir('files/laporan-akhir-files/' . $request['judul_penelitian'])) { } else {
        }
        $request->file('file_laporan_akhir')->move("files/laporan-akhir-files/", $file2_NewName);
        }

        $add->file_proposal=$file_NewName;
        $add->file_laporan_akhir=$file2_NewName;
        $add->id_sumber=$request['id_sumber'];
        $add->id_jenis_penelitian=$request['id_jenis_penelitian'];
        $add->id_semester=$request['id_semester'];
        $add->judul_penelitian=$request['judul_penelitian'];
        $add->tahun=$request['tahun'];
        $add->status='P';
        $add->save();
        Alert::success('Data Penelitian Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Penelitian.index');
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

    public function accept($id_penelitian)
    {
        //
        $acc = Model_Penelitian::where('id_penelitian',$id_penelitian)->first();
        $acc->status = "T";
        $acc->update();
        Alert::success('Data Penelitian Telah Diterima!');
        return redirect()->route('Penelitian.index');
    }
    public function decline($id_penelitian)
    {
        //
        $acc = Model_Penelitian::where('id_penelitian',$id_penelitian)->first();
        $acc->status = "F";
        $acc->update();
        Alert::success('Data Penelitian Telah Ditolak!');
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
