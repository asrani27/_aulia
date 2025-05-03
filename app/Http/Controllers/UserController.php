<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function pengaduan()
    {
        $data = Pengaduan::where('user_id', Auth::user()->id)->paginate(10);
        return view('user.pengaduan.index', compact('data'));
    }
    public function add_pengaduan()
    {
        return view('user.pengaduan.create');
    }
    public function store_pengaduan(Request $req)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Pengaduan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/user/pengaduan');
    }
    public function edit_pengaduan($id)
    {
        $data = Pengaduan::find($id);
        return view('user.pengaduan.edit', compact('data'));
    }

    public function update_pengaduan(Request $req, $id)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Pengaduan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/user/pengaduan');
    }
    public function delete_pengaduan($id)
    {

        Pengaduan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/user/pengaduan');
    }

    public function ajukan()
    {
        $data = Pengajuan::where('user_id', Auth::user()->id)->paginate(10);
        return view('user.ajukan.index', compact('data'));
    }
    public function add_ajukan()
    {
        return view('user.ajukan.create');
    }
    public function store_ajukan(Request $req)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Pengajuan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/user/ajukan');
    }
    public function edit_ajukan($id)
    {
        $data = Pengajuan::find($id);
        return view('user.ajukan.edit', compact('data'));
    }

    public function update_ajukan(Request $req, $id)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Pengajuan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/user/ajukan');
    }
    public function delete_ajukan($id)
    {
        Pengajuan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/user/ajukan');
    }
}
