@extends('layouts.master')

@section('title', 'Data Proyek')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Data Proyek</h1>
        <p class="text-slate-600">Kelola data proyek</p>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Search and Add Button -->
    <div class="mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <form action="{{ route('admin.proyek.index') }}" method="GET" class="flex-1 max-w-md">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari kode, nama, atau lokasi..."
                    class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
            </div>
        </form>
        <a href="{{ route('admin.proyek.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Tambah Proyek
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Proyek</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nilai Kontrak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Progress</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($proyeks as $index => $proyek)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ ($proyeks->currentPage() - 1) * $proyeks->perPage() + $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                            {{ $proyek->kode_proyek }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ $proyek->nama_proyek }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ $proyek->customer->nama_customer ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            Rp {{ number_format($proyek->nilai_kontrak ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($proyek->status === 'Perencanaan')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Perencanaan
                                </span>
                            @elseif($proyek->status === 'Berjalan')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Berjalan
                                </span>
                            @elseif($proyek->status === 'Selesai')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Dibatalkan
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <div class="w-24 bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $proyek->progress ?? 0 }}%"></div>
                                </div>
                                <span class="text-xs text-slate-600">{{ $proyek->progress ?? 0 }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.proyek.show', $proyek->id) }}"
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors"
                                    title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.proyek.edit', $proyek->id) }}"
                                    class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.proyek.destroy', $proyek->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-slate-500">
                            <i class="fas fa-project-diagram text-4xl mb-2"></i>
                            <p>Belum ada data proyek</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($proyeks->hasPages())
        <div class="mt-4 flex justify-center">
            {{ $proyeks->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
