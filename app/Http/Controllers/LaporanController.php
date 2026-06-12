<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Biaya;
use App\Models\Customer;
use App\Models\Proyek;
use App\Models\PenerimaanDana;
use App\Models\PengeluaranDana;
use App\Models\PengeluaranDanaDetail;
use App\Models\Monitoring;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display laporan page
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    /**
     * Export Pegawai to PDF
     */
    public function exportPegawai()
    {
        $pegawais = Pegawai::orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.pegawai', [
            'pegawais' => $pegawais,
            'title' => 'Laporan Data Pegawai',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-pegawai.pdf');
    }

    /**
     * Export Biaya to PDF
     */
    public function exportBiaya()
    {
        $biayas = Biaya::orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.biaya', [
            'biayas' => $biayas,
            'title' => 'Laporan Data Biaya',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-biaya.pdf');
    }

    /**
     * Export Customer to PDF
     */
    public function exportCustomer()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.customer', [
            'customers' => $customers,
            'title' => 'Laporan Data Customer',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-customer.pdf');
    }

    /**
     * Export Proyek to PDF
     */
    public function exportProyek()
    {
        $proyeks = Proyek::with('customer')->orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.proyek', [
            'proyeks' => $proyeks,
            'title' => 'Laporan Data Proyek',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-proyek.pdf');
    }

    /**
     * Export Penerimaan Dana to PDF
     */
    public function exportPenerimaan()
    {
        $penerimaans = PenerimaanDana::with('proyek')->orderBy('tanggal', 'desc')->get();
        
        $total = $penerimaans->sum('dana_diterima');
        
        $pdf = Pdf::loadView('admin.laporan.pdf.penerimaan', [
            'penerimaans' => $penerimaans,
            'total' => $total,
            'title' => 'Laporan Penerimaan Dana',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-penerimaan.pdf');
    }

    /**
     * Export Pengeluaran Dana to PDF
     */
    public function exportPengeluaran()
    {
        $pengeluarans = PengeluaranDana::with('proyek')->orderBy('tanggal', 'desc')->get();
        
        $total = $pengeluarans->sum('total');
        
        $pdf = Pdf::loadView('admin.laporan.pdf.pengeluaran', [
            'pengeluarans' => $pengeluarans,
            'total' => $total,
            'title' => 'Laporan Pengeluaran Dana',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-pengeluaran.pdf');
    }

    /**
     * Export Monitoring to PDF
     */
    public function exportMonitoring()
    {
        $monitorings = Monitoring::with('proyek')->orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.monitoring', [
            'monitorings' => $monitorings,
            'title' => 'Laporan Monitoring Proyek',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-monitoring.pdf');
    }

    /**
     * Export Users to PDF
     */
    public function exportUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('admin.laporan.pdf.users', [
            'users' => $users,
            'title' => 'Laporan Manajemen User',
            'company' => 'PT. SUKA TEKNIK PROPERTI',
            'date' => date('d F Y')
        ]);
        
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan-users.pdf');
    }
}