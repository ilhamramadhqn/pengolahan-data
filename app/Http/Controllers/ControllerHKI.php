<?php

namespace App\Http\Controllers;

use App\Models\Model_HKI;
use App\Models\Model_JenisHKI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerHKI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_HKI::get();
        return view('DaftarHKI.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jenishki = Model_JenisHKI::get();
        return view('DaftarHKI.tambah', compact('jenishki'));
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
        $add =new Model_HKI();
        $request->validate([
            'id_jenis_hki' => 'required',
            'no_hki' => 'required',
            'tanggal_permohonan' => 'required',
            'judul_hki' => 'required',
            'file_hki' => 'mimes:doc,docx,pdf'
        ]);  
        
        if(!$request->file('file_hki'))
        { 
        $file_NewName="";
        }
        else
        {
        $fileName   = $request->file('file_hki')->getClientOriginalName();
        $fileExt   = $request->file('file_hki')->getClientOriginalExtension();
        $file_NewName = date("Ymd")."-".$request['judul_hki']."." .$fileExt;
        if (is_dir('files/hki-files/' . $request['judul_hki'])) { } else {
        }
        $request->file('file_hki')->move("files/hki-files/", $file_NewName);
        }
        
        $add->file_hki=$file_NewName;
        $add->id_jenis_hki=$request['id_jenis_hki'];
        $add->no_hki=$request['no_hki'];
        $add->tanggal_permohonan=$request['tanggal_permohonan'];
        $add->judul_hki=$request['judul_hki'];
        $add->status='P';
        $add->save();
        Alert::success('Data HKI Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('HKI.index');
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
        $data = Model_HKI::find($id);
        $jenishki = Model_JenisHKI::get();
        return view('DaftarHKI.edit', compact('data', 'jenishki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hki)
    {
        //
        $update = Model_HKI::where('id_hki',$id_hki)->first();
        $request->validate([
            'id_jenis_hki' => 'required',
            'no_hki' => 'required',
            'tanggal_permohonan' => 'required',
            'judul_hki' => 'required',
            'file_hki' => 'mimes:doc,docx,pdf'
        ]);  
        
        if($request->hasfile('file_hki'))
        { 
        $destination = 'files/hki-files/'.$request->file_hki;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $fotoExt   = $request->file('file_hki')->getClientOriginalExtension();
        $file_NewName = date("Ymd")."-".$request['judul_hki']."." .$fotoExt; 
        $request->file('file_hki')->move("files/hki-files/", $file_NewName);
        $update->file_hki=$file_NewName;
        }

        $update->id_jenis_hki=$request['id_jenis_hki'];
        $update->no_hki=$request['no_hki'];
        $update->tanggal_permohonan=$request['tanggal_permohonan'];
        $update->judul_hki=$request['judul_hki'];
        $update->save();
        Alert::success('Data HKI Berhasil Diubah!');
        return redirect()->route('HKI.index');
    }

    public function accept($id_hki)
    {
        //
        $acc = Model_HKI::where('id_hki',$id_hki)->first();
        $acc->status = "T";
        $acc->update();
        Alert::success('Data HKI Telah Diterima!');
        return redirect()->route('HKI.index');
    }
    
    public function decline($id_hki)
    {
        //
        $acc = Model_HKI::where('id_hki',$id_hki)->first();
        $acc->status = "F";
        $acc->update();
        Alert::success('Data HKI Telah Ditolak!');
        return redirect()->route('HKI.index');
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
        $delete = Model_HKI::where('id_hki',$id)->first();
        $destination = 'files/hki-files/'.$delete->file_hki;
        if(File::exists($destination)){
            File::delete($destination);
        }
        
        $delete->delete();
        Alert::success('Data HKI Berhasil Dihapus!');
        return redirect()->route('HKI.index');
    }
}
