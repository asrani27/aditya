@extends('layouts.master')

@section('title', 'Detail Monitoring')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.monitoring.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Monitoring</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap monitoring proyek</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                        <i class="fas fa-clipboard-check text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $monitoring->nomor_monitoring }}</h2>
                        <p class="text-slate-600">Monitoring Proyek</p>
                    </div>
                </div>
                <div>
                    @if($monitoring->status == 'Selesai')
                        <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Selesai</span>
                    @elseif($monitoring->status == 'Dalam Progress')
                        <span class="px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded-full">Dalam Progress</span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full">Menunggu</span>
                    @endif
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nomor Monitoring -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">No. Monitoring</label>
                        <p class="text-slate-800 font-medium">{{ $monitoring->nomor_monitoring }}</p>
                    </div>

                    <!-- Tanggal Monitoring -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal Monitoring</label>
                        <p class="text-slate-800">{{ $monitoring->tanggal_monitoring->format('d F Y') }}</p>
                    </div>

                    <!-- Proyek -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Proyek</label>
                        <p class="text-slate-800">{{ $monitoring->proyek->nama_proyek ?? '-' }}</p>
                    </div>

                    <!-- Pegawai -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Pegawai</label>
                        <p class="text-slate-800">{{ $monitoring->pegawai->nama ?? '-' }}</p>
                    </div>

                    <!-- Tahapan Pekerjaan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tahapan Pekerjaan</label>
                        <p class="text-slate-800">{{ $monitoring->tahapan_pekerjaan }}</p>
                    </div>

                    <!-- Detail Tugas -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Detail Tugas</label>
                        <p class="text-slate-800">{{ $monitoring->detail_tugas }}</p>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal Selesai</label>
                        <p class="text-slate-800">{{ $monitoring->tanggal_selesai->format('d F Y') }}</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Status</label>
                        <p class="text-slate-800">{{ $monitoring->status }}</p>
                    </div>

                    <!-- Keterangan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Keterangan</label>
                        <p class="text-slate-800">{{ $monitoring->keterangan ?? '-' }}</p>
                    </div>

                    <!-- Dibuat Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $monitoring->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Diperbarui Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $monitoring->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.monitoring.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.monitoring.edit', $monitoring->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit Monitoring
            </a>
        </div>
    </div>
</div>
@endsection