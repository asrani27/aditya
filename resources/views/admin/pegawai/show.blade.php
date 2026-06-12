@extends('layouts.master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.pegawai.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pegawai</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap pegawai</p>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-slate-300 flex items-center justify-center mr-4">
                        <i class="fas fa-user text-slate-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $pegawai->nama }}</h2>
                        <p class="text-slate-600">{{ $pegawai->telp }}</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Telepon</label>
                        <p class="text-slate-800">{{ $pegawai->telp }}</p>
                    </div>

                    <!-- Tanggal Bekerja -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Tanggal Bekerja</label>
                        <p class="text-slate-800">{{ \Carbon\Carbon::parse($pegawai->tanggal_bekerja)->format('d F Y') }}</p>
                    </div>

                    <!-- Dibuat Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $pegawai->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Diperbarui Pada -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $pegawai->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.pegawai.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit Pegawai
            </a>
        </div>
    </div>
</div>
@endsection
