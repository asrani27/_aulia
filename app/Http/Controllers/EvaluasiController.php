<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EvaluasiController extends Controller
{
    public function index()
    {
        $data = Evaluasi::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.evaluasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.evaluasi.create');
    }
    public function edit($id)
    {
        $data =  Evaluasi::find($id);
        return view('superadmin.evaluasi.edit', compact('data'));
    }
    public function delete($id)
    {
        Evaluasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function store(Request $req)
    {
        $data =  Evaluasi::create($req->all());
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/evaluasi');
    }
    public function update(Request $req, $id)
    {
        $data =  Evaluasi::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/evaluasi');
    }
}
