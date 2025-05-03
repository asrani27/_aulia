<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.dokumen.index', compact('data'));
    }
    public function add()
    {
        $klien = Klien::get();
        return view('superadmin.dokumen.create', compact('klien'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Dokumen::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/dokumen');
    }
    public function edit($id)
    {
        $klien = Klien::get();
        $data = Dokumen::find($id);
        return view('superadmin.dokumen.edit', compact('data', 'klien'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Dokumen::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/dokumen');
    }
    public function delete($id)
    {
        Dokumen::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/dokumen');
    }
}
