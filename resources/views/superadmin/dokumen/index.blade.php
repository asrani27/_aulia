@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data dokumen</h3>

                <div class="card-tools">
                    <a href="/superadmin/dokumen/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Kode Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Keterangan</th>
                            <th>Tanggal Masuk</th>
                            <th>Nama Klien</th>
                            <th>Url Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>DOK-{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->klien == null ? null : $item->klien->nama}}</td>
                            <td>{{$item->url}}</td>
                            <td class="text-right">

                                <a href="/superadmin/dokumen/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/dokumen/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection