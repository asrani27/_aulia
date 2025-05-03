@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Evaluasi Dokumen</h3>

                <div class="card-tools">
                    <a href="/superadmin/evaluasi/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Kode Evaluasi</th>
                            <th>Kode Verifikasi</th>
                            <th>Tanggal Evaluasi</th>
                            <th>Keterangan Evaluasi</th>
                            <th>Detail Klien</th>
                            <th>Detail Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>EVAL-{{$item->id}}</td>
                            <td>VERIF-{{$item->verifikasi_id}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                            <td>{{$item->keterangan}}</td>

                            <td>
                                Nama : {{$item->verifikasi->dokumen->klien->nama}} <br />
                                Email : {{$item->verifikasi->dokumen->klien->email}}
                            </td>
                            <td>
                                Nama Dokumen :{{$item->verifikasi->dokumen->nama}}<br />
                                URL Dokumen :{{$item->verifikasi->dokumen->url}}

                            </td>
                            <td class="text-right">

                                <a href="/superadmin/evaluasi/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/evaluasi/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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