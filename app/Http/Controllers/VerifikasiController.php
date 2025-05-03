<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Penerima;
use App\Models\Tksk;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Verifikasi::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.verifikasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.verifikasi.create');
    }
    public function edit($id)
    {
        $data =  Verifikasi::find($id);
        return view('superadmin.verifikasi.edit', compact('data'));
    }
    public function delete($id)
    {
        Verifikasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function store(Request $req)
    {
        $data =  Verifikasi::create($req->all());
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/verifikasi');
    }
    public function update(Request $req, $id)
    {
        $data =  Verifikasi::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/verifikasi');
    }
}
