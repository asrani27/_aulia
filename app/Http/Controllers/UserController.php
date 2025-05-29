<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Dokumen;
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
    public function klien_index()
    {
        $data = Klien::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);

        return view('user.klien.index', compact('data'));
    }
    public function klien_add()
    {
        return view('user.klien.create');
    }
    public function klien_store(Request $req)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Klien::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/user/klien');
    }
    public function klien_edit($id)
    {
        $data = Klien::find($id);
        return view('user.klien.edit', compact('data'));
    }

    public function klien_update(Request $req, $id)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        Klien::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/user/klien');
    }
    public function klien_delete($id)
    {
        Klien::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/user/klien');
    }

    public function dokumen()
    {
        $klien_id = Klien::where('user_id', Auth::user()->id)->pluck('id');
        $data = Dokumen::whereIn('klien_id', $klien_id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.dokumen.index', compact('data'));
    }
    public function add_dokumen()
    {
        $klien = Klien::where('user_id', Auth::user()->id)->get();
        return view('user.dokumen.create', compact('klien'));
    }
    public function store_dokumen(Request $req)
    {
        $param = $req->all();
        Dokumen::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/user/dokumen');
    }
    public function edit_dokumen($id)
    {
        $klien = Klien::get();
        $data = Dokumen::find($id);
        return view('user.dokumen.edit', compact('data', 'klien'));
    }

    public function update_dokumen(Request $req, $id)
    {
        $param = $req->all();
        Dokumen::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/user/dokumen');
    }
    public function delete_dokumen($id)
    {
        Dokumen::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/user/dokumen');
    }
}
