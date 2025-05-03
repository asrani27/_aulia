@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Verifikasi Dokumen</h3>

                <div class="card-tools">
                    <a href="/superadmin/verifikasi/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Kode Verifikasi</th>
                            <th>Kode Dokumen</th>
                            <th>Keterangan Verifikasi</th>
                            <th>Status Verifikasi</th>
                            <th>Klien</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>VERIF-{{$item->id}}</td>
                            <td>DOK-{{$item->dokumen_id}}</td>
                            <td>{{$item->keterangan}}</td>

                            <td>
                                @if ($item->status == 'VALID')
                                <span class="badge badge-success">{{$item->status}}</span>
                                @else
                                <span class="badge badge-danger">{{$item->status}}</span>
                                @endif
                            </td>

                            <td>{{$item->dokumen->klien->nama}}</td>
                            <td>{{$item->dokumen->klien->email}}</td>
                            <td class="text-right">

                                <a href="/superadmin/verifikasi/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/verifikasi/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin dihapus, data distribusi yang terkait akan ikut terhapus?');"><i
                                        class="fa fa-trash"></i></a>
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