<?php

namespace App\Http\Controllers;

use App\Models\Model_Pkm;
use App\Models\Model_Sumber;
use App\Models\Model_Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPkm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Model_Pkm::get();
        return view('DaftarPkm.index',compact('data'));
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
        $mitra = Model_Mitra::get();
        return view('DaftarPkm.tambah', compact('sumber', 'mitra'));
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
        $add =new Model_Pkm();
        $request->validate([
            'id_sumber' => 'required',
            'id_mitra' => 'required',
            'judul_kegiatan' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'file_proposal' => 'mimes:doc,docx,pdf',
            'file_laporan_akhir' => 'mimes:doc,docx,pdf'
        ]);  
        
        if(!$request->file('file_proposal'))
        { 
        $file_NewName="";
        }
        else
        {
        $fileName   = $request->file('file_proposal')->getClientOriginalName();
        $fileExt   = $request->file('file_proposal')->getClientOriginalExtension();
        $file_NewName = "PKM-".date("Ymd")."-".$request['judul_kegiatan']."." .$fileExt;
        if (is_dir('files/proposal-files/' . $request['judul_kegiatan'])) { } else {
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
        $file2_NewName = "PKM-".date("Ymd")."-".$request['judul_kegiatan']."." .$file2Ext;
        if (is_dir('files/laporan-akhir-files/' . $request['judul_kegiatan'])) { } else {
        }
        $request->file('file_laporan_akhir')->move("files/laporan-akhir-files/", $file2_NewName);
        }

        $add->file_proposal=$file_NewName;
        $add->file_laporan_akhir=$file2_NewName;
        $add->id_sumber=$request['id_sumber'];
        $add->id_mitra=$request['id_mitra'];
        $add->judul_kegiatan=$request['judul_kegiatan'];
        $add->tanggal_awal=$request['tanggal_awal'];
        $add->tanggal_akhir=$request['tanggal_akhir'];
        $add->status='P';
        $add->save();
        Alert::success('Data PKM Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Pengabdian-Masyarakat.index');
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
        $data = Model_Pkm::find($id);
        $sumber = Model_Sumber::get();
        $mitra = Model_Mitra::get();
        return view('DaftarPkm.edit', compact('data', 'sumber', 'mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pkm)
    {
        //
        $update = Model_Pkm::where('id_pkm',$id_pkm)->first();
        $request->validate([
            'id_sumber' => 'required',
            'id_mitra' => 'required',
            'judul_kegiatan' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
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
        $file_NewName = "PKM-".date("Ymd")."-".$request['judul_kegiatan']."." .$fotoExt; 
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
        $file2_NewName = "PKM-".date("Ymd")."-".$request['judul_kegiatan']."." .$foto2Ext; 
        $request->file('file_laporan_akhir')->move("files/laporan-akhir-files/", $file2_NewName);
        $update->file_laporan_akhir=$file2_NewName;
        }

        $update->id_sumber=$request['id_sumber'];
        $update->id_mitra=$request['id_mitra'];
        $update->judul_kegiatan=$request['judul_kegiatan'];
        $update->tanggal_awal=$request['tanggal_awal'];
        $update->tanggal_akhir=$request['tanggal_akhir'];
        $update->update();
        Alert::success('Data PKM Berhasil Diubah!');
        return redirect()->route('Pengabdian-Masyarakat.index');
    }

    public function accept($id_pkm)
    {
        //
        $acc = Model_Pkm::where('id_pkm',$id_pkm)->first();
        $acc->status = "T";
        $acc->update();
        Alert::success('Data PKM Telah Diterima!');
        return redirect()->route('Pengabdian-Masyarakat.index');
    }
    
    public function decline($id_pkm)
    {
        //
        $acc = Model_Pkm::where('id_pkm',$id_pkm)->first();
        $acc->status = "F";
        $acc->update();
        Alert::success('Data PKM Telah Ditolak!');
        return redirect()->route('Pengabdian-Masyarakat.index');
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
        $delete = Model_Pkm::where('id_pkm',$id)->first();
        $destination = 'files/proposal-files/'.$delete->file_proposal;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination2 = 'files/laporan-akhir-files/'.$delete->file_laporan_akhir;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $delete->delete();
        Alert::success('Data PKM Berhasil Dihapus!');
        return redirect()->route('Pengabdian-Masyarakat.index');
    }
}
