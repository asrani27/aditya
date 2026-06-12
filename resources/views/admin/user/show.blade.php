@extends('layouts.master')

@section('title', 'Detail User')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.users.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail User</h1>
        </div>
        <p class="text-slate-600">Informasi lengkap user</p>
    </div>

    <!-- User Detail Card -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-full bg-slate-300 flex items-center justify-center mr-4">
                        <i class="fas fa-user text-slate-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $user->name }}</h2>
                        <p class="text-slate-600">{{ $user->email }}</p>
                    </div>
                </div>
                <div>
                    @if($user->is_active)
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                            Aktif
                        </span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            <div class="border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Username -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Username</label>
                        <p class="text-slate-800">{{ $user->username }}</p>
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Role</label>
                        @if($user->role === 'admin')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                Admin
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                Direktur
                            </span>
                        @endif
                    </div>

                    <!-- Last Login -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Login Terakhir</label>
                        <p class="text-slate-800">
                            @if($user->last_login_at)
                                {{ $user->last_login_at->format('d F Y, H:i') }}
                            @else
                                <span class="text-slate-400">Belum pernah login</span>
                            @endif
                        </p>
                    </div>

                    <!-- Created At -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Dibuat Pada</label>
                        <p class="text-slate-800">{{ $user->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Updated At -->
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Diperbarui Pada</label>
                        <p class="text-slate-800">{{ $user->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Edit User
                </a>
            @endif
        </div>
    </div>
</div>
@endsection