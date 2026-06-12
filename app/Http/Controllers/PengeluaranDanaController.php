<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranDana;
use App\Models\PengeluaranDanaDetail;
use App\Models\Proyek;
use App\Models\Pegawai;
use App\Models\Biaya;
use Illuminate\Http\Request;

class PengeluaranDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengeluaranDana::with(['proyek', 'pegawai']);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nota', 'like', '%' . $search . '%')
                    ->orWhereHas('proyek', function ($pq) use ($search) {
                        $pq->where('nama_proyek', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('pegawai', function ($pq) use ($search) {
                        $pq->where('nama', 'like', '%' . $search . '%');
                    });
            });
        }

        $pengeluarans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        $biayas = Biaya::orderBy('nama')->get();
        return view('admin.pengeluaran.create', compact('proyeks', 'pegawais', 'biayas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nota' => 'required|string|max:255|unique:pengeluaran_dana,nota',
            'tanggal' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'keterangan' => 'nullable|string',
        ]);

        // Create details
        $details = $request->input('details', []);
        $total = 0;

        foreach ($details as $detail) {
            if (!empty($detail['biaya_id']) && !empty($detail['jumlah'])) {
                $biaya = Biaya::find($detail['biaya_id']);
                $harga = $biaya->harga ?? 0;
                $jumlah = (int) $detail['jumlah'];
                $subtotal = $harga * $jumlah;
                $total += $subtotal;
            }
        }

        // Create PengeluaranDana with total
        $validated['total'] = $total;
        $pengeluaran = PengeluaranDana::create($validated);

        // Create details
        foreach ($details as $detail) {
            if (!empty($detail['biaya_id']) && !empty($detail['jumlah'])) {
                $biaya = Biaya::find($detail['biaya_id']);
                $harga = $biaya->harga ?? 0;
                $jumlah = (int) $detail['jumlah'];
                $subtotal = $harga * $jumlah;

                PengeluaranDanaDetail::create([
                    'pengeluaran_dana_id' => $pengeluaran->id,
                    'biaya_id' => $detail['biaya_id'],
                    'kode' => $detail['kode'] ?? '',
                    'nama' => $detail['nama'] ?? '',
                    'deskripsi' => $detail['deskripsi'] ?? null,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                    'total' => $subtotal,
                ]);
            }
        }

        return redirect()->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran dana berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengeluaranDana $pengeluaran)
    {
        $pengeluaran->load(['proyek', 'pegawai', 'details.biaya']);
        return view('admin.pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengeluaranDana $pengeluaran)
    {
        $proyeks = Proyek::orderBy('kode_proyek')->get();
        $pegawais = Pegawai::orderBy('nama')->get();
        $biayas = Biaya::orderBy('nama')->get();
        $pengeluaran->load('details');
        return view('admin.pengeluaran.edit', compact('pengeluaran', 'proyeks', 'pegawais', 'biayas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengeluaranDana $pengeluaran)
    {
        $validated = $request->validate([
            'nota' => 'required|string|max:255|unique:pengeluaran_dana,nota,' . $pengeluaran->id,
            'tanggal' => 'required|date',
            'proyek_id' => 'required|exists:proyek,id',
            'pegawai_id' => 'required|exists:pegawai,id',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        // Delete existing details and recreate
        $pengeluaran->details()->delete();

        $details = $request->input('details', []);
        $total = 0;

        foreach ($details as $detail) {
            if (!empty($detail['biaya_id']) && !empty($detail['jumlah'])) {
                $biaya = Biaya::find($detail['biaya_id']);
                $harga = $biaya->harga ?? 0;
                $jumlah = (int) $detail['jumlah'];
                $subtotal = $harga * $jumlah;
                $total += $subtotal;

                PengeluaranDanaDetail::create([
                    'pengeluaran_dana_id' => $pengeluaran->id,
                    'biaya_id' => $detail['biaya_id'],
                    'kode' => $detail['kode'] ?? '',
                    'nama' => $detail['nama'] ?? '',
                    'deskripsi' => $detail['deskripsi'] ?? null,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                    'total' => $subtotal,
                ]);
            }
        }

        // Update total
        $pengeluaran->update(['total' => $total]);

        return redirect()->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran dana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengeluaranDana $pengeluaran)
    {
        // Delete related details first
        $pengeluaran->details()->delete();
        $pengeluaran->delete();

        return redirect()->route('admin.pengeluaran.index')
            ->with('success', 'Data pengeluaran dana berhasil dihapus.');
    }
}
