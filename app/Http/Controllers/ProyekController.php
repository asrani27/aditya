<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Proyek::with('customer');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_proyek', 'like', '%' . $search . '%')
                    ->orWhere('nama_proyek', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        $proyeks = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.proyek.index', compact('proyeks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('nama_customer')->get();
        return view('admin.proyek.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_proyek' => 'required|string|max:255|unique:proyek,kode_proyek',
            'customer_id' => 'required|exists:customer,id',
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'nilai_kontrak' => 'nullable|numeric|min:0',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Perencanaan,Berjalan,Selesai,Dibatalkan',
            'progress' => 'nullable|integer|min:0|max:100',
        ]);

        Proyek::create($validated);

        return redirect()->route('admin.proyek.index')
            ->with('success', 'Data proyek berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        $proyek->load('customer');
        return view('admin.proyek.show', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        $customers = Customer::orderBy('nama_customer')->get();
        return view('admin.proyek.edit', compact('proyek', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        $validated = $request->validate([
            'kode_proyek' => 'required|string|max:255|unique:proyek,kode_proyek,' . $proyek->id,
            'customer_id' => 'required|exists:customer,id',
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'nilai_kontrak' => 'nullable|numeric|min:0',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Perencanaan,Berjalan,Selesai,Dibatalkan',
            'progress' => 'nullable|integer|min:0|max:100',
        ]);

        $proyek->update($validated);

        return redirect()->route('admin.proyek.index')
            ->with('success', 'Data proyek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();

        return redirect()->route('admin.proyek.index')
            ->with('success', 'Data proyek berhasil dihapus.');
    }
}
