@extends('layouts.master')

@section('title', 'Detail Pengeluaran Dana')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.pengeluaran.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pengeluaran Dana</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap pengeluaran dana</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mr-4">
                        <i class="fas fa-arrow-up text-red-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $pengeluaran->nota }}</h2>
                        <p class="text-slate-600">Pengeluaran Dana</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No. Nota -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">No. Nota</label>
                        <p class="text-slate-800 font-medium">{{ $pengeluaran->nota }}</p>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal</label>
                        <p class="text-slate-800">{{ $pengeluaran->tanggal->format('d F Y') }}</p>
                    </div>

                    <!-- Proyek -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Proyek</label>
                        <p class="text-slate-800">{{ $pengeluaran->proyek->nama_proyek ?? '-' }}</p>
                    </div>

                    <!-- Pegawai -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Pegawai</label>
                        <p class="text-slate-800">{{ $pengeluaran->pegawai->nama ?? '-' }}</p>
                    </div>

                    <!-- Total -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Total Pengeluaran</label>
                        <p class="text-slate-800 font-semibold text-lg">Rp {{ number_format($pengeluaran->total, 0, ',', '.') }}</p>
                    </div>

                    <!-- Dibuat Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $pengeluaran->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Diperbarui Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $pengeluaran->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Detail Items -->
            @if($pengeluaran->details && $pengeluaran->details->count() > 0)
            <div class="border-t border-slate-200 mt-6 pt-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Detail Items</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border border-slate-200 rounded-lg">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Kode</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Biaya</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-700 uppercase">Harga</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-700 uppercase">Jumlah</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-700 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($pengeluaran->details as $index => $detail)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-3 text-sm text-slate-600">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm text-slate-800">{{ $detail->kode }}</td>
                                <td class="px-4 py-3 text-sm text-slate-800">{{ $detail->nama }}</td>
                                <td class="px-4 py-3 text-sm text-slate-600">{{ $detail->biaya->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm text-slate-600 text-right">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-sm text-slate-600 text-right">{{ $detail->jumlah }}</td>
                                <td class="px-4 py-3 text-sm text-slate-800 font-medium text-right">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-slate-50">
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-right font-semibold text-slate-700">Total:</td>
                                <td class="px-4 py-3 font-semibold text-slate-800 text-right">Rp {{ number_format($pengeluaran->total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.pengeluaran.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.pengeluaran.edit', $pengeluaran->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit Pengeluaran
            </a>
        </div>
    </div>
</div>
@endsection