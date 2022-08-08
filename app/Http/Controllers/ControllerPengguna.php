<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerPengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::get();
        return view('Users.index',compact('data'));
    }

    public function data_admin()
    {
        //
        $route = "Admin";
        $data = User::where('authority', 'ADMIN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data', 'route'));
    }
    public function data_dekan()
    {
        //
        $route = "Dekan";
        $data = User::where('authority', 'DEKAN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data', 'route'));
    }
    public function data_dosen()
    {
        //
        $route = "Dosen";
        $data = User::where('authority', 'DOSEN')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data', 'route'));
    }
    public function data_mahasiswa()
    {
        //
        $route = "Mahasiswa";
        $data = User::where('authority', 'MAHASISWA')->orderBy('id', 'desc')->get();
        return view('User.data_admin',compact('data', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_admin()
    {
        //
        $route = "Admin";
        return view('User.create_admin', compact('route'));
    }
    public function create_dekan()
    {
        //
        $route = "Dekan";
        return view('User.create_admin', compact('route'));
    }
    public function create_dosen()
    {
        //
        $route = "Dosen";
        return view('User.create_admin', compact('route'));
    }
    public function create_mahasiswa()
    {
        //
        $route = "Mahasiswa";
        return view('User.create_admin', compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_admin(Request $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'authority' => "ADMIN",
            'password' => Hash::make($request['password']),
        ]);

        Alert::success('Data User Admin Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Data-Admin.data_admin');
    }
    public function store_dekan(Request $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'authority' => "DEKAN",
            'password' => Hash::make($request['password']),
        ]);

        Alert::success('Data User Dekan Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Data-Dekan.data_admin');
    }
    public function store_dosen(Request $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'authority' => "DOSEN",
            'password' => Hash::make($request['password']),
        ]);

        Alert::success('Data User Dosen Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Data-Dosen.data_admin');
    }
    public function store_mahasiswa(Request $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'authority' => "MAHASISWA",
            'password' => Hash::make($request['password']),
        ]);

        Alert::success('Data User Mahasiswa Berhasil Ditambahkan!');
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('Data-Mahasiswa.data_admin');
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
    public function update(Request $request, $id_jurnal)
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
        $data = User::findOrFail($id);
        $data->delete();
        Alert::success('Data User Berhasil Dihapus!');
        return redirect()->route('Data-Admin.data_admin');
    }
}
