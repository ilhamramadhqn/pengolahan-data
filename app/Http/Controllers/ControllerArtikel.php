<?php

namespace App\Http\Controllers;

use App\Models\Model_Artikel;
use App\Models\Model_Jurnal;
use App\Models\Model_Penelitian;
use App\Models\Model_Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerArtikel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Artikel::get();
        return view('Artikel.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jurnal = Model_Jurnal::get();
        $penelitian = Model_Penelitian::get();
        $semester = Model_Semester::get();
        return view('Artikel.tambah', compact('jurnal', 'penelitian', 'semester'));
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
        $add =new Model_Artikel();
        $request->validate([
            'id_jurnal' => 'required',
            'id_penelitian' => 'required',
            'id_semester' => 'required',
            'volume' => 'required',
            'no_jurnal' => 'required',
            'tanggal' => 'required',
            'judul_artikel' => 'required',
            'link' => 'required',
            'file_artikel' => 'mimes:doc,docx,pdf'
        ]);  
        
        if(!$request->file('file_artikel'))
        { 
        $file_NewName="";
        }
        else
        {
        $fileName   = $request->file('file_artikel')->getClientOriginalName();
        $fileExt   = $request->file('file_artikel')->getClientOriginalExtension();
        $file_NewName = date("Ymd")."-".$request['judul_artikel']."." .$fileExt;
        if (is_dir('files/artikel-files/' . $request['judul_artikel'])) { } else {
        }
        $request->file('file_artikel')->move("files/artikel-files/", $file_NewName);
        }
        

        $add->file_artikel=$file_NewName;
        $add->id_jurnal=$request['id_jurnal'];
        $add->id_penelitian=$request['id_penelitian'];
        $add->id_semester=$request['id_semester'];
        $add->volume=$request['volume'];
        $add->no_jurnal=$request['no_jurnal'];
        $add->tanggal=$request['tanggal'];
        $add->judul_artikel=$request['judul_artikel'];
        $add->link=$request['link'];
        $add->status='P';
        $add->save();
        Alert::success('Data Artikel Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Artikel.index');
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
        $data = Model_Artikel::find($id);
        $jurnal = Model_Jurnal::get();
        $penelitian = Model_Penelitian::get();
        $semester = Model_Semester::get();
        return view('Artikel.edit', compact('data', 'jurnal', 'penelitian', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_artikel)
    {
        //
        $update = Model_Artikel::where('id_artikel',$id_artikel)->first();
        $request->validate([
            'id_jurnal' => 'required',
            'id_penelitian' => 'required',
            'id_semester' => 'required',
            'volume' => 'required',
            'no_jurnal' => 'required',
            'tanggal' => 'required',
            'judul_artikel' => 'required',
            'link' => 'required',
            'file_artikel' => 'mimes:doc,docx,pdf'
        ]);  
        
        if($request->hasfile('file_artikel'))
        { 
        $destination = 'files/artikel-files/'.$request->file_artikel;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $fotoExt   = $request->file('file_artikel')->getClientOriginalExtension();
        $file_NewName = date("Ymd")."-".$request['judul_artikel']."." .$fotoExt; 
        $request->file('file_artikel')->move("files/artikel-files/", $file_NewName);
        $update->file_artikel=$file_NewName;
        }

        $update->id_jurnal=$request['id_jurnal'];
        $update->id_penelitian=$request['id_penelitian'];
        $update->id_semester=$request['id_semester'];
        $update->volume=$request['volume'];
        $update->no_jurnal=$request['no_jurnal'];
        $update->tanggal=$request['tanggal'];
        $update->judul_artikel=$request['judul_artikel'];
        $update->link=$request['link'];
        $update->save();
        Alert::success('Data Artikel Berhasil Diubah!');
        return redirect()->route('Artikel.index');
    }

    public function accept($id_artikel)
    {
        //
        $acc = Model_Artikel::where('id_artikel',$id_artikel)->first();
        $acc->status = "T";
        $acc->update();
        Alert::success('Data Artikel Telah Diterima!');
        return redirect()->route('Artikel.index');
    }

    public function decline($id_artikel)
    {
        //
        $acc = Model_Artikel::where('id_artikel',$id_artikel)->first();
        $acc->status = "F";
        $acc->update();
        Alert::success('Data Artikel Telah Ditolak!');
        return redirect()->route('Artikel.index');
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
        $delete = Model_Artikel::where('id_artikel',$id)->first();
        $destination = 'files/artikel-files/'.$delete->file_artikel;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $delete->delete();
        Alert::success('Data Artikel Berhasil Dihapus!');
        return redirect()->route('Artikel.index');
    }
}
