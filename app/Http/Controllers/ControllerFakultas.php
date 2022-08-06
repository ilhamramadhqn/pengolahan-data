<?php

namespace App\Http\Controllers;

use App\Models\Model_Fakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerFakultas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        // if (request()->ajax()) {
        //     $fakultass = Model_Fakultas::get();
        //     return datatables()->of($fakultass)
        //     ->addColumn('action', function($fakultass){
        //         $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$fakultass->id_fakultas.'" data-original-title="Edit" class="edit btn btn-icon btn-primary btn-sm editFk"><i class="fas fa-edit"></i></a>';
                
        //         $button = $button.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$fakultass->id_fakultas.'" data-original-title="Delete" class="btn btn-icon btn-danger btn-sm deleteFk"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
        //         return $button;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        $data = Model_Fakultas::get();
        return view('MasterDataRekap/Fakultas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MasterDataRekap/Fakultas.tambah');
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
            'kode_fakultas' => 'required|unique:fakultas,kode_fakultas|min:3|max:4',
            'nama_fakultas' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Model_Fakultas::create($request->all());

        Alert::success('Data Fakultas Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Fakultas.index');
    
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
        $data = Model_Fakultas::find($id);
        return view('MasterDataRekap/Fakultas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fakultas)
    {
        $validatedData = $request->validate([
            'kode_fakultas' => 'required|min:3|max:4',
            'nama_fakultas' => 'required'
        ]);
        Model_Fakultas::whereid_fakultas($id_fakultas)->update($validatedData);
        Alert::success('Data Fakultas Berhasil Diubah!');
        return redirect()->route('Fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Model_Fakultas::findOrFail($id);
        $data->delete();
        Alert::success('Data Fakultas Berhasil Dihapus!');
        return redirect()->route('Fakultas.index');
    }
}
