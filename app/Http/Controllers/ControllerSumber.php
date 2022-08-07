<?php

namespace App\Http\Controllers;

use App\Models\Model_Sumber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerSumber extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            //
            $data = Model_Sumber::get();
            return view('MasterDataRekap/Sumber.index',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('MasterDataRekap/Sumber.tambah');
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
            'sumber_dana' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Model_Sumber::create($request->all());

        Alert::success('Data Sumber Dana Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Sumber.index');
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
        $data = Model_Sumber::find($id);
        return view('MasterDataRekap/Sumber.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sumber)
    {
        //
        $validatedData = $request->validate([
            'sumber_dana' => 'required'
        ]);
        Model_Sumber::whereid_sumber($id_sumber)->update($validatedData);
        Alert::success('Data Sumber Berhasil Diubah!');
        return redirect()->route('Sumber.index');
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
        $data = Model_Sumber::findOrFail($id);
        $data->delete();
        Alert::success('Data Sumber Berhasil Dihapus!');
        return redirect()->route('Sumber.index');
    }
}
