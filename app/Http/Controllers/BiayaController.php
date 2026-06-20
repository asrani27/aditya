<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Biaya::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%');
            });
        }

        $biayas = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.biaya.index', compact('biayas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biaya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:biaya,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
        ]);

        Biaya::create($validated);

        return redirect()->route('admin.biaya.index')
            ->with('success', 'Data biaya berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Biaya $biaya)
    {
        return view('admin.biaya.show', compact('biaya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biaya $biaya)
    {
        return view('admin.biaya.edit', compact('biaya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biaya $biaya)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:biaya,kode,' . $biaya->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
        ]);

        $biaya->update($validated);

        return redirect()->route('admin.biaya.index')
            ->with('success', 'Data biaya berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biaya $biaya)
    {
        $biaya->delete();

        return redirect()->route('admin.biaya.index')
            ->with('success', 'Data biaya berhasil dihapus.');
    }
}
