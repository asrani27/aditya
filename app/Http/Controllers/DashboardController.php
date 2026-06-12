<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Customer;
use App\Models\PenerimaanDana;
use App\Models\PengeluaranDana;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Count data
        $totalProyek = Proyek::count();
        $proyekBerjalan = Proyek::where('status', 'berjalan')->count();
        $totalCustomer = Customer::count();
        $totalPegawai = Pegawai::count();
        
        // Calculate total pendapatan from penerimaan_dana
        $totalPendapatan = PenerimaanDana::sum('dana_diterima');
        
        // Get projects grouped by status
        $proyekByStatus = Proyek::select('status')->selectRaw('count(*) as total')->groupBy('status')->get();
        
        // Get status counts
        $statusCounts = [];
        foreach ($proyekByStatus as $item) {
            $statusCounts[$item->status] = $item->total;
        }
        
        // Get recent projects with customer
        $recentProyeks = Proyek::with('customer')->orderBy('created_at', 'desc')->limit(5)->get();
        
        return view('admin.dashboard', [
            'totalProyek' => $totalProyek,
            'proyekBerjalan' => $proyekBerjalan,
            'totalCustomer' => $totalCustomer,
            'totalPegawai' => $totalPegawai,
            'totalPendapatan' => $totalPendapatan,
            'statusCounts' => $statusCounts,
            'recentProyeks' => $recentProyeks,
        ]);
    }
}