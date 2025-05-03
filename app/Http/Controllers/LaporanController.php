<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pengaduan;
use App\Models\Distribusi;
use App\Models\Dokumen;
use App\Models\Evaluasi;
use App\Models\Klien;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function klien()
    {
        return view('superadmin.laporan.klien');
    }
    public function dokumen()
    {
        return view('superadmin.laporan.dokumen');
    }
    public function verifikasi()
    {
        return view('superadmin.laporan.verifikasi');
    }
    public function evaluasi()
    {
        return view('superadmin.laporan.evaluasi');
    }
    public function index()
    {
        return view('superadmin.laporan.index');
    }
    public function pdfklien()
    {
        // $bulan = request()->get('bulan');
        // $tahun = request()->get('tahun');

        $data = Klien::get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_klien', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

    public function pdfdokumen()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Dokumen::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_dokumen', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

    public function pdfevaluasi()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Evaluasi::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_evaluasi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }


    public function pdfverifikasi()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Verifikasi::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_verifikasi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }


    public function bulan()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        if (request()->get('jenis') == '1') {
            $data = Penerima::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', null)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_calon', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '2') {
            $data = Penerima::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', 'diterima')
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_penerima', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '3') {
            $data = Distribusi::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_distribusi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '4') {
            $data = Pengaduan::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_pengaduan', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
    }
}
