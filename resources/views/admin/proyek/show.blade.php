@extends('layouts.master')

@section('title', 'Detail Proyek')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.proyek.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Proyek</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap proyek</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                        <i class="fas fa-project-diagram text-purple-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $proyek->nama_proyek }}</h2>
                        <p class="text-slate-600">Kode: {{ $proyek->kode_proyek }}</p>
                    </div>
                </div>
                <div>
                    @if($proyek->status === 'Perencanaan')
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                            Perencanaan
                        </span>
                    @elseif($proyek->status === 'Berjalan')
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            Berjalan
                        </span>
                    @elseif($proyek->status === 'Selesai')
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                            Selesai
                        </span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                            Dibatalkan
                        </span>
                    @endif
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-700">Progress</span>
                    <span class="text-sm font-medium text-slate-700">{{ $proyek->progress }}%</span>
                </div>
                <div class="w-full bg-slate-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $proyek->progress }}%"></div>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Customer -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Customer</label>
                        <p class="text-slate-800">{{ $proyek->customer->nama_customer ?? '-' }}</p>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Lokasi</label>
                        <p class="text-slate-800">{{ $proyek->lokasi ?? '-' }}</p>
                    </div>

                    <!-- Nilai Kontrak -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Nilai Kontrak</label>
                        <p class="text-slate-800 font-semibold">Rp {{ number_format($proyek->nilai_kontrak ?? 0, 0, ',', '.') }}</p>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal Mulai</label>
                        <p class="text-slate-800">{{ $proyek->tanggal_mulai ? \Carbon\Carbon::parse($proyek->tanggal_mulai)->format('d F Y') : '-' }}</p>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal Selesai</label>
                        <p class="text-slate-800">{{ $proyek->tanggal_selesai ? \Carbon\Carbon::parse($proyek->tanggal_selesai)->format('d F Y') : '-' }}</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Deskripsi</label>
                        <p class="text-slate-800">{{ $proyek->deskripsi ?? '-' }}</p>
                    </div>

                    <!-- Dibuat Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $proyek->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Diperbarui Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $proyek->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.proyek.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.proyek.edit', $proyek->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit Proyek
            </a>
        </div>
    </div>
</div>
@endsection
