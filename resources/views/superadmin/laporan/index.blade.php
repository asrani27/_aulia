@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Laporan Per Bulan</h3>

                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <form method="get" action="/superadmin/laporan/bulan" target="_blank">
                    @csrf
                    <select class="form-control" name="bulan" required>
                        <option value="">-bulan-</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <br>
                    <select class="form-control" name="tahun" required>
                        <option value="">-tahun-</option>
                        <option value="2025">2025</option>
                    </select>
                    <br>
                    <select class="form-control" name="jenis" required>
                        <option value="">-jenis laporan-</option>
                        <option value="1">Calon Penerima</option>
                        <option value="2">Penerima Bantuan</option>
                        <option value="3">Distribusi Bantuan</option>
                        <option value="4">Pengaduan</option>
                    </select>
                    <br />
                    <button type="submit" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-print"></i>
                        Print</button>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection