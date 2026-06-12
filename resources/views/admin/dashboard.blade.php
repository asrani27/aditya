@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-500">Selamat datang di Sistem Manajemen Proyek</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Proyek -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Proyek</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalProyek }}</p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-project-diagram text-blue-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-500">Total proyek dalam sistem</span>
        </div>
    </div>

    <!-- Proyek Berjalan -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Proyek Berjalan</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $proyekBerjalan }}</p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-spinner text-yellow-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-500">Proyek sedang aktif</span>
        </div>
    </div>

    <!-- Total Customer -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Customer</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalCustomer }}</p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-green-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-500">Total Customer: {{ $totalCustomer }}</span>
        </div>
    </div>

    <!-- Total Pendapatan -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Pendapatan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-money-bill-wave text-red-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-500">Total dana diterima</span>
        </div>
    </div>
</div>

<!-- Charts & Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Proyek Status Chart -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Status Proyek</h2>
        <div class="space-y-4">
            @php
            $statusLabels = [
            'perencanaan' => 'Perencanaan',
            'berjalan' => 'Berjalan',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
            ];
            $statusColors = [
            'perencanaan' => 'bg-blue-500',
            'berjalan' => 'bg-yellow-500',
            'selesai' => 'bg-green-500',
            'dibatalkan' => 'bg-red-500'
            ];
            $badgeColors = [
            'perencanaan' => 'bg-blue-100 text-blue-700',
            'berjalan' => 'bg-yellow-100 text-yellow-700',
            'selesai' => 'bg-green-100 text-green-700',
            'dibatalkan' => 'bg-red-100 text-red-700'
            ];
            $total = $totalProyek > 0 ? $totalProyek : 1;
            @endphp

            @foreach($statusLabels as $status => $label)
            @php
            $count = $statusCounts[$status] ?? 0;
            $percentage = $totalProyek > 0 ? ($count / $total) * 100 : 0;
            @endphp
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">{{ $label }}</span>
                    <span class="font-medium text-gray-800">{{ $count }} Proyek</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="{{ $statusColors[$status] }} h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Recent Proyek -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Proyek Terbaru</h2>
            <a href="{{ route('admin.proyek.index') }}" class="text-sm text-red-600 hover:text-red-700">Lihat semua</a>
        </div>
        <div class="space-y-4">
            @forelse($recentProyeks as $proyek)
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-project-diagram text-yellow-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">{{ $proyek->nama_proyek }}</p>
                    <p class="text-sm text-gray-500">Customer: {{ $proyek->customer->nama ?? '-' }}</p>
                </div>
                <span
                    class="px-3 py-1 text-xs font-medium {{ $badgeColors[$proyek->status] ?? 'bg-gray-100 text-gray-700' }} rounded-full">
                    {{ ucfirst($proyek->status) }}
                </span>
            </div>
            @empty
            <p class="text-center text-gray-500">Belum ada proyek</p>
            @endforelse
        </div>
    </div>
</div>
@endsection