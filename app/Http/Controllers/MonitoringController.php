<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\MonitoringDetail;
use App\Models\Proyek;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Monitoring::with(['proyek', 'pegawai']);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_monitoring', 'like', '%' . $search . '%')
                    ->orWhere('tahapan_pekerjaan', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('proyek', function ($pq) use ($search) {
                        $pq->where('nama_proyek', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('pegawai', function ($pq) use ($search) {
                        $pq->where('nama', 'like', '%' . $search . '%');
                    });
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $monitorings = $query->orderBy('tanggal_monitoring', 'desc')->paginate(10);
        return view('admin.monitoring.index', compact('monitorings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        $statusOptions = ['Selesai', 'Dalam Progress', 'Menunggu'];
        return view('admin.monitoring.create', compact('proyeks', 'pegawais', 'statusOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_monitoring' => 'required|string|max:255|unique:monitoring,nomor_monitoring',
            'tanggal_monitoring' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'tahapan_pekerjaan' => 'required|string',
            'detail_tugas' => 'required|string',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Selesai,Dalam Progress,Menunggu',
            'keterangan' => 'nullable|string',
        ]);

        // Calculate total progress from details
        $progress = 0;
        $details = [];
        if ($request->has('detail_parameter') && is_array($request->detail_parameter)) {
            foreach ($request->detail_parameter as $index => $parameter) {
                if (!empty($parameter)) {
                    $detailProgress = $request->detail_progress[$index] ?? 0;
                    $progress += (int)$detailProgress;
                    $details[] = [
                        'parameter' => $parameter,
                        'progress' => (int)$detailProgress,
                    ];
                }
            }
        }

        $monitoring = Monitoring::create(array_merge($validated, ['progress' => $progress]));

        // Save details
        foreach ($details as $detail) {
            MonitoringDetail::create([
                'monitoring_id' => $monitoring->id,
                'parameter' => $detail['parameter'],
                'progress' => $detail['progress'],
            ]);
        }

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitoring $monitoring)
    {
        $monitoring->load(['proyek', 'pegawai']);
        return view('admin.monitoring.show', compact('monitoring'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        $statusOptions = ['Selesai', 'Dalam Progress', 'Menunggu'];
        $monitoring->load('details');
        return view('admin.monitoring.edit', compact('monitoring', 'proyeks', 'pegawais', 'statusOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        $validated = $request->validate([
            'nomor_monitoring' => 'required|string|max:255|unique:monitoring,nomor_monitoring,' . $monitoring->id,
            'tanggal_monitoring' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'tahapan_pekerjaan' => 'required|string',
            'detail_tugas' => 'required|string',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Selesai,Dalam Progress,Menunggu',
            'keterangan' => 'nullable|string',
        ]);

        // Calculate total progress from details
        $progress = 0;
        $details = [];
        if ($request->has('detail_parameter') && is_array($request->detail_parameter)) {
            foreach ($request->detail_parameter as $index => $parameter) {
                if (!empty($parameter)) {
                    $detailProgress = $request->detail_progress[$index] ?? 0;
                    $progress += (int)$detailProgress;
                    $details[] = [
                        'parameter' => $parameter,
                        'progress' => (int)$detailProgress,
                    ];
                }
            }
        }

        $monitoring->update(array_merge($validated, ['progress' => $progress]));

        // Delete old details and create new ones
        $monitoring->details()->delete();
        foreach ($details as $detail) {
            MonitoringDetail::create([
                'monitoring_id' => $monitoring->id,
                'parameter' => $detail['parameter'],
                'progress' => $detail['progress'],
            ]);
        }

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        $monitoring->delete();

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil dihapus.');
    }
}