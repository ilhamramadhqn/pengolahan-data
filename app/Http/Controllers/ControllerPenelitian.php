<?php

namespace App\Http\Controllers;

use App\Models\Model_Penelitian;
use App\Models\Model_Sumber;
use App\Models\Model_JenisPublikasi;
use App\Models\Model_Semester;
use App\Exports\PenelitianExport;
use App\Imports\PenelitianImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
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
            'tahun' => '',
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
        $file_NewName = "Penelitian-".date("Ymd")."-".$request['judul_penelitian']."." .$fileExt;
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
        $file2_NewName = "Penelitian-".date("Ymd")."-".$request['judul_penelitian']."." .$file2Ext;
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
        $data = Model_Penelitian::find($id);
        $sumber = Model_Sumber::get();
        $jenispublikasi = Model_JenisPublikasi::get();
        $semester = Model_Semester::get();
        return view('DaftarPenelitian.edit', compact('data', 'sumber', 'jenispublikasi', 'semester'));
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
        $update = Model_Penelitian::where('id_penelitian',$id_penelitian)->first();
        $request->validate([
            'id_sumber' => 'required',
            'id_jenis_penelitian' => 'required',
            'id_semester' => 'required',
            'judul_penelitian' => 'required',
            'tahun' => '',
            'file_proposal' => 'mimes:doc,docx,pdf',
            'file_laporan_akhir' => 'mimes:doc,docx,pdf'
        ]);  
        
        if($request->hasfile('file_proposal'))
        { 
        $destination = 'files/proposal-files/'.$request->file_proposal;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $fotoExt   = $request->file('file_proposal')->getClientOriginalExtension();
        $file_NewName = "Penelitian-".date("Ymd")."-".$request['judul_penelitian']."." .$fotoExt; 
        $request->file('file_proposal')->move("files/proposal-files/", $file_NewName);
        $update->file_proposal=$file_NewName;
        }

        if($request->hasfile('file_laporan_akhir'))
        { 
        $destination2 = 'files/laporan-akhir-files/'.$request->file_laporan_akhir;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $foto2Ext   = $request->file('file_laporan_akhir')->getClientOriginalExtension();
        $file2_NewName = "Penelitian-".date("Ymd")."-".$request['judul_penelitian']."." .$foto2Ext; 
        $request->file('file_laporan_akhir')->move("files/laporan-akhir-files/", $file2_NewName);
        $update->file_laporan_akhir=$file2_NewName;
        }

        $update->id_sumber=$request['id_sumber'];
        $update->id_jenis_penelitian=$request['id_jenis_penelitian'];
        $update->id_semester=$request['id_semester'];
        $update->judul_penelitian=$request['judul_penelitian'];
        $update->tahun=$request['tahun'];
        $update->update();
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
        $delete = Model_Penelitian::where('id_penelitian',$id)->first();
        $destination = 'files/proposal-files/'.$delete->file_proposal;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination2 = 'files/laporan-akhir-files/'.$delete->file_laporan_akhir;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $delete->delete();
        Alert::success('Data Penelitian Berhasil Dihapus!');
        return redirect()->route('Penelitian.index');
    }

    public function grafik_penelitian()
    {
        //
        $total_penelitian = Model_Penelitian::join("semester", "penelitian.id_semester", "=", "semester.id_semester")
        ->select(DB::raw("COUNT(Distinct penelitian.id_penelitian) as total_penelitian")) //tambahin distinc
        ->groupBy("penelitian.id_penelitian")
        ->pluck('total_penelitian');
        
        $semester = Model_Penelitian::join("semester", "penelitian.id_semester", "=", "semester.id_semester")
        ->select("semester.nama_semester as semester")
        ->groupBy("penelitian.id_penelitian")
        ->orderBy("semester.id_semester", "ASC")
        ->pluck('semester');
        
        $tot = Model_Penelitian::join("semester", "penelitian.id_semester", "=", "semester.id_semester")
        ->select(DB::raw("COUNT(penelitian.id_penelitian) as total_penelitian"))
        ->groupBy("penelitian.id_penelitian")
        ->pluck('total_penelitian')->count();
        return view('home',compact('total_penelitian', 'semester', 'tot'));
    }

    public function export()
    {
        return Excel::download(new PenelitianExport, "penelitian.xlsx");
    }

    public function import_form()
    {
        return view('DaftarPenelitian.import');
    }
    public function import(Request $request)
    {
        $file = $request->file('import_file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataPenelitian', $nameFile);

        Excel::import(new PenelitianImport, public_path('/DataPenelitian/'.$nameFile));
        Alert::success('Data Penelitian Berhasil Diimport!');
        return redirect()->route('Penelitian.index');
    }
}
