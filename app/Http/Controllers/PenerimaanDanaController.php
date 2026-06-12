<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanDana;
use App\Models\Proyek;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PenerimaanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PenerimaanDana::with(['proyek', 'pegawai']);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_kwitansi', 'like', '%' . $search . '%')
                    ->orWhere('keterangan', 'like', '%' . $search . '%')
                    ->orWhereHas('proyek', function ($pq) use ($search) {
                        $pq->where('nama_proyek', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('pegawai', function ($pq) use ($search) {
                        $pq->where('nama', 'like', '%' . $search . '%');
                    });
            });
        }

        $penerimaans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.penerimaan.index', compact('penerimaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('admin.penerimaan.create', compact('proyeks', 'pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kwitansi' => 'required|string|max:255|unique:penerimaan_dana,no_kwitansi',
            'tanggal' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'dana_diterima' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        PenerimaanDana::create($validated);

        return redirect()->route('admin.penerimaan.index')
            ->with('success', 'Data penerimaan dana berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaanDana $penerimaan)
    {
        $penerimaan->load(['proyek', 'pegawai']);
        return view('admin.penerimaan.show', compact('penerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaanDana $penerimaan)
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('admin.penerimaan.edit', compact('penerimaan', 'proyeks', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerimaanDana $penerimaan)
    {
        $validated = $request->validate([
            'no_kwitansi' => 'required|string|max:255|unique:penerimaan_dana,no_kwitansi,' . $penerimaan->id,
            'tanggal' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'dana_diterima' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $penerimaan->update($validated);

        return redirect()->route('admin.penerimaan.index')
            ->with('success', 'Data penerimaan dana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaanDana $penerimaan)
    {
        $penerimaan->delete();

        return redirect()->route('admin.penerimaan.index')
            ->with('success', 'Data penerimaan dana berhasil dihapus.');
    }
}
