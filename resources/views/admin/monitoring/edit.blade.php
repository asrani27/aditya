@extends('layouts.master')

@section('title', 'Edit Monitoring')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.monitoring.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Edit Monitoring</h1>
        </div>
        <p class="text-slate-600">Edit data monitoring: {{ $monitoring->nomor_monitoring }}</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.monitoring.update', $monitoring->id) }}" method="POST" id="monitoringForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Monitoring -->
                <div>
                    <label for="nomor_monitoring" class="block text-sm font-medium text-slate-700 mb-2">
                        No. Monitoring <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nomor_monitoring" id="nomor_monitoring"
                        value="{{ old('nomor_monitoring', $monitoring->nomor_monitoring) }}"
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
                    <input type="date" name="tanggal_monitoring" id="tanggal_monitoring"
                        value="{{ old('tanggal_monitoring', $monitoring->tanggal_monitoring->format('Y-m-d')) }}"
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
                        <option value="{{ $proyek->id }}" {{ old('proyek_id', $monitoring->proyek_id) == $proyek->id ? 'selected' : '' }}>
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
                        <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $monitoring->pegawai_id) == $pegawai->id ? 'selected' : '' }}>
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
                    <input type="text" name="tahapan_pekerjaan" id="tahapan_pekerjaan"
                        value="{{ old('tahapan_pekerjaan', $monitoring->tahapan_pekerjaan) }}"
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
                        placeholder="Jelaskan detail tugas yang harus dilakukan">{{ old('detail_tugas', $monitoring->detail_tugas) }}</textarea>
                    @error('detail_tugas')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $monitoring->tanggal_selesai->format('Y-m-d')) }}"
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
                        <option value="{{ $status }}" {{ old('status', $monitoring->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Detail Parameter Progress -->
                <div class="md:col-span-2">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-slate-700">
                            Detail Parameter Progress <span class="text-red-500">*</span>
                        </label>
                        <button type="button" id="addDetailBtn"
                            class="px-3 py-1 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-plus mr-1"></i> Tambah Parameter
                        </button>
                    </div>
                    
                    <!-- Header Row -->
                    <div class="grid grid-cols-12 gap-2 mb-2">
                        <div class="col-span-7 text-sm font-medium text-slate-600">Parameter</div>
                        <div class="col-span-4 text-sm font-medium text-slate-600">Progress (%)</div>
                        <div class="col-span-1"></div>
                    </div>
                    
                    <!-- Detail Rows Container -->
                    <div id="detailContainer">
                        @php
                            $details = old('detail_parameter') ? array_map(function($i) {
                                return [
                                    'parameter' => old('detail_parameter.' . $i),
                                    'progress' => old('detail_progress.' . $i)
                                ];
                            }, array_keys(old('detail_parameter'))) : ($monitoring->details ?? collect([]));
                        @endphp
                        
                        @if(count($details) > 0)
                            @foreach($details as $index => $detail)
                            <div class="grid grid-cols-12 gap-2 mb-2 detail-row">
                                <div class="col-span-7">
                                    <input type="text" name="detail_parameter[]" placeholder="Contoh: Pasang Bata"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ is_array($detail) ? $detail['parameter'] : ($detail->parameter ?? '') }}">
                                </div>
                                <div class="col-span-4">
                                    <input type="number" name="detail_progress[]" min="0" max="100" placeholder="0-100"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 detail-progress-input"
                                        value="{{ is_array($detail) ? $detail['progress'] : ($detail->progress ?? 0) }}">
                                </div>
                                <div class="col-span-1 flex items-center justify-center">
                                    <button type="button" class="text-red-500 hover:text-red-700 remove-detail-btn" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="grid grid-cols-12 gap-2 mb-2 detail-row">
                                <div class="col-span-7">
                                    <input type="text" name="detail_parameter[]" placeholder="Contoh: Pasang Bata"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        value="">
                                </div>
                                <div class="col-span-4">
                                    <input type="number" name="detail_progress[]" min="0" max="100" placeholder="0-100"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 detail-progress-input"
                                        value="0">
                                </div>
                                <div class="col-span-1 flex items-center justify-center">
                                    <button type="button" class="text-red-500 hover:text-red-700 remove-detail-btn" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Total Progress Display -->
                    <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-blue-700">Total Progress:</span>
                            <span id="totalProgress" class="text-2xl font-bold text-blue-700">{{ $monitoring->progress ?? 0 }}%</span>
                        </div>
                    </div>
                    
                    @error('detail_parameter')
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
                        placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan', $monitoring->keterangan) }}</textarea>
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
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var container = document.getElementById('detailContainer');
    var addBtn = document.getElementById('addDetailBtn');
    var totalProgressEl = document.getElementById('totalProgress');
    var statusSelect = document.getElementById('status');
    
    // Function to calculate total progress and update status
    function calculateTotalProgress() {
        var total = 0;
        var inputs = document.querySelectorAll('.detail-progress-input');
        for (var i = 0; i < inputs.length; i++) {
            total += parseInt(inputs[i].value) || 0;
        }
        totalProgressEl.textContent = total + '%';
        
        // Auto-set status based on total progress
        if (total >= 100) {
            statusSelect.value = 'Selesai';
        } else if (total > 0) {
            statusSelect.value = 'Dalam Progress';
        } else {
            statusSelect.value = 'Menunggu';
        }
    }
    
    // Add new detail row
    addBtn.addEventListener('click', function() {
        var newRow = document.createElement('div');
        newRow.className = 'grid grid-cols-12 gap-2 mb-2 detail-row';
        newRow.innerHTML = '<div class="col-span-7">' +
            '<input type="text" name="detail_parameter[]" placeholder="Contoh: Cat Dinding" ' +
            'class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">' +
            '</div>' +
            '<div class="col-span-4">' +
            '<input type="number" name="detail_progress[]" min="0" max="100" placeholder="0-100" ' +
            'class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 detail-progress-input" ' +
            'value="0">' +
            '</div>' +
            '<div class="col-span-1 flex items-center justify-center">' +
            '<button type="button" class="text-red-500 hover:text-red-700 remove-detail-btn" title="Hapus">' +
            '<i class="fas fa-trash"></i>' +
            '</button>' +
            '</div>';
        container.appendChild(newRow);
        
        // Add event listener to the new progress input
        newRow.querySelector('.detail-progress-input').addEventListener('input', calculateTotalProgress);
        
        // Add remove functionality
        newRow.querySelector('.remove-detail-btn').addEventListener('click', function() {
            if (document.querySelectorAll('.detail-row').length > 1) {
                newRow.remove();
                calculateTotalProgress();
            }
        });
    });
    
    // Add event listeners to existing progress inputs
    var progressInputs = document.querySelectorAll('.detail-progress-input');
    for (var j = 0; j < progressInputs.length; j++) {
        progressInputs[j].addEventListener('input', calculateTotalProgress);
    }
    
    // Add remove functionality to existing remove buttons
    var removeBtns = document.querySelectorAll('.remove-detail-btn');
    for (var k = 0; k < removeBtns.length; k++) {
        removeBtns[k].addEventListener('click', function() {
            if (document.querySelectorAll('.detail-row').length > 1) {
                this.closest('.detail-row').remove();
                calculateTotalProgress();
            }
        });
    }
    
    // Calculate initial total
    calculateTotalProgress();
});
</script>
@endpush
