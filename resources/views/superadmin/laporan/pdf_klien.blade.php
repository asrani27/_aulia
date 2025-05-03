<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logo-tanbu.png'))) }}"
                    width="70px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                <font size="24px"><b>SEKRETARIAT DAERAH KABUPATEN TANAH BUMBU <br />
                    </b></font>
                JL Dharma Praja No 1 Pd Butun Kec. Batu Licin <br />
                Kabupaten Tanah Bumbu Kalimantan Selatan
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA KLIEN<br>
        Tanggal : {{\Carbon\Carbon::now()->format('d M Y')}}
        {{-- PERIODE : {{angkaKeBulan($bulan)}} -
        {{$tahun}} --}}
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Golongan</th>
            <th>Jabatan</th>
            <th>Instansi</th>
            <th>Nama Pimpinan</th>
            <th>Email</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->nip}}</td>
            <td>{{$item->golongan}}</td>
            <td>{{$item->jabatan}}</td>
            <td>{{$item->dinas}}</td>
            <td>{{$item->pimpinan}}</td>
            <td>{{$item->email}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Mengetahui, <br />
                Pimpinan<br /><br /><br /><br />

                <u>-</u><br />
                NIP.
            </td>
        </tr>
    </table>
</body>

</html>