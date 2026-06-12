@extends('layouts.master')

@section('title', 'Edit Penerimaan Dana')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.penerimaan.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Edit Penerimaan Dana</h1>
        </div>
        <p class="text-slate-600">Edit data penerimaan dana: {{ $penerimaan->no_kwitansi }}</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.penerimaan.update', $penerimaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- No. Kwitansi -->
                <div>
                    <label for="no_kwitansi" class="block text-sm font-medium text-slate-700 mb-2">
                        No. Kwitansi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="no_kwitansi" id="no_kwitansi"
                        value="{{ old('no_kwitansi', $penerimaan->no_kwitansi) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('no_kwitansi') border-red-500 @enderror"
                        placeholder="Contoh: KW-2026-001">
                    @error('no_kwitansi')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal" id="tanggal"
                        value="{{ old('tanggal', $penerimaan->tanggal) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal') border-red-500 @enderror">
                    @error('tanggal')
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
                        <option value="{{ $proyek->id }}" {{ old('proyek_id', $penerimaan->proyek_id) == $proyek->id ?
                            'selected' : '' }}>
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
                        <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $penerimaan->pegawai_id) == $pegawai->id
                            ? 'selected' : '' }}>
                            ID {{ $pegawai->id }} - {{ $pegawai->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dana Diterima -->
                <div>
                    <label for="dana_diterima" class="block text-sm font-medium text-slate-700 mb-2">
                        Dana Diterima (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="dana_diterima" id="dana_diterima"
                        value="{{ old('dana_diterima', $penerimaan->dana_diterima) }}" min="0"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('dana_diterima') border-red-500 @enderror"
                        placeholder="Masukkan jumlah dana">
                    @error('dana_diterima')
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
                        placeholder="Masukkan keterangan (opsional)">{{ old('keterangan', $penerimaan->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.penerimaan.index') }}"
                    class="px-6 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection