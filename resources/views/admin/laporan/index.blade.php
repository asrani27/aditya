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
            <a href="{{ route('admin.laporan.exportProyek') }}" target="_blank"
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
            <a href="{{ route('admin.laporan.exportPenerimaan') }}" target="_blank"
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
            <a href="{{ route('admin.laporan.exportPengeluaran') }}" target="_blank"
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
    </div>
</div>
@endsection