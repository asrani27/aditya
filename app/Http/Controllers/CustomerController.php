<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Customer::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_customer', 'like', '%' . $search . '%')
                    ->orWhere('nama_customer', 'like', '%' . $search . '%')
                    ->orWhere('telepon', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_customer' => 'required|string|max:255|unique:customer,kode_customer',
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'pic' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()->route('admin.customer.index')
            ->with('success', 'Data customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'kode_customer' => 'required|string|max:255|unique:customer,kode_customer,' . $customer->id,
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'pic' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.customer.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('admin.customer.index')
            ->with('success', 'Data customer berhasil dihapus.');
    }
}
