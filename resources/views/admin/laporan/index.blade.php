@extends('layouts.master')

@section('title', 'Laporan')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Laporan</h1>
        <p class="text-slate-600">Export data ke PDF untuk setiap menu</p>
    </div>

    <!-- Grid of Export Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Data Pegawai -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Data Pegawai</h3>
                    <p class="text-sm text-slate-500">Export semua data pegawai</p>
                </div>
            </div>
            <a href="{{ route('admin.laporan.exportPegawai') }}" target="_blank"
                class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Data Biaya -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Data Biaya</h3>
                    <p class="text-sm text-slate-500">Export semua data biaya</p>
                </div>
            </div>
            <a href="{{ route('admin.laporan.exportBiaya') }}" target="_blank"
                class="block w-full bg-green-600 text-white text-center py-2 rounded-lg hover:bg-green-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Data Customer -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-users text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Data Customer</h3>
                    <p class="text-sm text-slate-500">Export semua data customer</p>
                </div>
            </div>
            <a href="{{ route('admin.laporan.exportCustomer') }}" target="_blank"
                class="block w-full bg-purple-600 text-white text-center py-2 rounded-lg hover:bg-purple-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Data Proyek -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-project-diagram text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Data Proyek</h3>
                    <p class="text-sm text-slate-500">Export semua data proyek</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Mulai Tanggal</label>
                        <input type="date" id="filter-proyek-start" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-01') }}">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Sampai Tanggal</label>
                        <input type="date" id="filter-proyek-end" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <a href="#" onclick="exportProyek(); return false;"
                class="block w-full bg-yellow-600 text-white text-center py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Penerimaan Dana -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-arrow-down text-emerald-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Penerimaan Dana</h3>
                    <p class="text-sm text-slate-500">Export semua penerimaan dana</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Mulai Tanggal</label>
                        <input type="date" id="filter-penerimaan-start" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-01') }}">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Sampai Tanggal</label>
                        <input type="date" id="filter-penerimaan-end" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <a href="#" onclick="exportPenerimaan(); return false;"
                class="block w-full bg-emerald-600 text-white text-center py-2 rounded-lg hover:bg-emerald-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Pengeluaran Dana -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-arrow-up text-red-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Pengeluaran Dana</h3>
                    <p class="text-sm text-slate-500">Export semua pengeluaran dana</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Mulai Tanggal</label>
                        <input type="date" id="filter-pengeluaran-start" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-01') }}">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Sampai Tanggal</label>
                        <input type="date" id="filter-pengeluaran-end" class="w-full border rounded px-3 py-2 text-sm"
                            value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <a href="#" onclick="exportPengeluaran(); return false;"
                class="block w-full bg-red-600 text-white text-center py-2 rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Monitoring -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-clipboard-check text-indigo-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Monitoring</h3>
                    <p class="text-sm text-slate-500">Export semua data monitoring</p>
                </div>
            </div>
            <a href="{{ route('admin.laporan.exportMonitoring') }}" target="_blank"
                class="block w-full bg-indigo-600 text-white text-center py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Manajemen User -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-users-cog text-gray-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Manajemen User</h3>
                    <p class="text-sm text-slate-500">Export semua data user</p>
                </div>
            </div>
            <a href="{{ route('admin.laporan.exportUsers') }}" target="_blank"
                class="block w-full bg-gray-600 text-white text-center py-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>

        <!-- Jurnal Umum -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-book text-teal-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Jurnal Umum</h3>
                    <p class="text-sm text-slate-500">Export jurnal umum debit & kredit</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Bulan</label>
                        <select id="filter-jurnal-bulan" class="w-full border rounded px-3 py-2 text-sm">
                            @foreach(['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'] as $key => $value)
                            <option value="{{ $key }}" {{ date('m') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500 mb-1">Tahun</label>
                        <select id="filter-jurnal-tahun" class="w-full border rounded px-3 py-2 text-sm">
                            @for($y = date('Y') - 5; $y <= date('Y'); $y++)
                            <option value="{{ $y }}" {{ date('Y') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <a href="#" onclick="exportJurnalUmum(); return false;"
                class="block w-full bg-teal-600 text-white text-center py-2 rounded-lg hover:bg-teal-700 transition-colors">
                <i class="fas fa-file-pdf mr-2"></i>Export PDF
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function exportProyek() {
    var start = document.getElementById('filter-proyek-start').value;
    var end = document.getElementById('filter-proyek-end').value;
    window.open('{{ route('admin.laporan.exportProyek') }}?start=' + start + '&end=' + end, '_blank');
}

function exportPenerimaan() {
    var start = document.getElementById('filter-penerimaan-start').value;
    var end = document.getElementById('filter-penerimaan-end').value;
    window.open('{{ route('admin.laporan.exportPenerimaan') }}?start=' + start + '&end=' + end, '_blank');
}

function exportPengeluaran() {
    var start = document.getElementById('filter-pengeluaran-start').value;
    var end = document.getElementById('filter-pengeluaran-end').value;
    window.open('{{ route('admin.laporan.exportPengeluaran') }}?start=' + start + '&end=' + end, '_blank');
}

function exportJurnalUmum() {
    var bulan = document.getElementById('filter-jurnal-bulan').value;
    var tahun = document.getElementById('filter-jurnal-tahun').value;
    window.open('{{ route('admin.laporan.exportJurnalUmum') }}?month=' + bulan + '&year=' + tahun, '_blank');
}
</script>
@endpush
