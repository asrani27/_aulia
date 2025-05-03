<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KlienController extends Controller
{
    public function index()
    {
        $data = Klien::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.klien.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.klien.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Klien::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/klien');
    }
    public function edit($id)
    {
        $data = Klien::find($id);
        return view('superadmin.klien.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Klien::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/klien');
    }
    public function delete($id)
    {
        Klien::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/klien');
    }
}
