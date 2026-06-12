@extends('layouts.master')

@section('title', 'Tambah Monitoring')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.monitoring.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Monitoring Baru</h1>
        </div>
        <p class="text-slate-600">Tambahkan data monitoring proyek baru</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.monitoring.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Monitoring -->
                <div>
                    <label for="nomor_monitoring" class="block text-sm font-medium text-slate-700 mb-2">
                        No. Monitoring <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nomor_monitoring" id="nomor_monitoring" value="{{ old('nomor_monitoring') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nomor_monitoring') border-red-500 @enderror"
                        placeholder="Contoh: MON-2026-001">
                    @error('nomor_monitoring')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Monitoring -->
                <div>
                    <label for="tanggal_monitoring" class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal Monitoring <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_monitoring" id="tanggal_monitoring" value="{{ old('tanggal_monitoring', date('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_monitoring') border-red-500 @enderror">
                    @error('tanggal_monitoring')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proyek -->
                <div>
                    <label for="proyek_id" class="block text-sm font-medium text-slate-700 mb-2">
                        Proyek <span class="text-red-500">*</span>
                    </label>
                    <select name="proyek_id" id="proyek_id"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('proyek_id') border-red-500 @enderror">
                        <option value="">-- Pilih Proyek --</option>
                        @foreach($proyeks as $proyek)
                        <option value="{{ $proyek->id }}" {{ old('proyek_id')==$proyek->id ? 'selected' : '' }}>
                            ID{{ $proyek->kode_proyek }} - {{ $proyek->nama_proyek }}
                        </option>
                        @endforeach
                    </select>
                    @error('proyek_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pegawai -->
                <div>
                    <label for="pegawai_id" class="block text-sm font-medium text-slate-700 mb-2">
                        Pegawai <span class="text-red-500">*</span>
                    </label>
                    <select name="pegawai_id" id="pegawai_id"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('pegawai_id') border-red-500 @enderror">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawais as $pegawai)
                        <option value="{{ $pegawai->id }}" {{ old('pegawai_id')==$pegawai->id ? 'selected' : '' }}>
                            ID {{ $pegawai->id }} - {{ $pegawai->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahapan Pekerjaan -->
                <div class="md:col-span-2">
                    <label for="tahapan_pekerjaan" class="block text-sm font-medium text-slate-700 mb-2">
                        Tahapan Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="tahapan_pekerjaan" id="tahapan_pekerjaan" value="{{ old('tahapan_pekerjaan') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tahapan_pekerjaan') border-red-500 @enderror"
                        placeholder="Contoh: Pondasi, Struktur Beton, Finishing">
                    @error('tahapan_pekerjaan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Detail Tugas -->
                <div class="md:col-span-2">
                    <label for="detail_tugas" class="block text-sm font-medium text-slate-700 mb-2">
                        Detail Tugas <span class="text-red-500">*</span>
                    </label>
                    <textarea name="detail_tugas" id="detail_tugas" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('detail_tugas') border-red-500 @enderror"
                        placeholder="Jelaskan detail tugas yang harus dilakukan">{{ old('detail_tugas') }}</textarea>
                    @error('detail_tugas')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_selesai') border-red-500 @enderror">
                    @error('tanggal_selesai')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                        @foreach($statusOptions as $status)
                        <option value="{{ $status }}" {{ old('status')==$status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-2">
                        Keterangan
                    </label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('keterangan') border-red-500 @enderror"
                        placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.monitoring.index') }}"
                    class="px-6 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection