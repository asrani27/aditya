@extends('layouts.master')

@section('title', 'Detail Biaya')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.biaya.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Biaya</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap biaya</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mr-4">
                        <i class="fas fa-money-bill-wave text-green-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $biaya->nama }}</h2>
                        <p class="text-slate-600">Kode: {{ $biaya->kode }}</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kode -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Kode Biaya</label>
                        <p class="text-slate-800 font-medium">{{ $biaya->kode }}</p>
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Nama Biaya</label>
                        <p class="text-slate-800">{{ $biaya->nama }}</p>
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Harga</label>
                        <p class="text-slate-800 font-semibold text-lg">Rp {{ number_format($biaya->harga, 0, ',', '.') }}</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Deskripsi</label>
                        <p class="text-slate-800">{{ $biaya->deskripsi ?? '-' }}</p>
                    </div>

                    <!-- Dibuat Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $biaya->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Diperbarui Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $biaya->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.biaya.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.biaya.edit', $biaya->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit Biaya
            </a>
        </div>
    </div>
</div>
@endsection
