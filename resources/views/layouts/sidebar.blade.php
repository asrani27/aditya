<aside class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 text-white flex-shrink-0">
    <div class="h-full flex flex-col">
        <!-- Logo & Company Name -->
        <div class="p-6 border-b border-slate-700">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-building text-slate-700 text-lg"></i>
                </div>
                <span class="font-semibold text-sm">PT. SUKA TEKNIK PROPERTI</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-home w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Data Pegawai -->
                <li>
                    <a href="{{ route('admin.pegawai.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.pegawai.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-user-tie w-5 mr-3"></i>
                        <span>Data Pegawai</span>
                    </a>
                </li>

                <!-- Data Biaya -->
                <li>
                    <a href="{{ route('admin.biaya.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.biaya.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-money-bill-wave w-5 mr-3"></i>
                        <span>Data Biaya</span>
                    </a>
                </li>

                <!-- Data Customer -->
                <li>
                    <a href="{{ route('admin.customer.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.customer.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-users w-5 mr-3"></i>
                        <span>Data Customer</span>
                    </a>
                </li>

                <!-- Proyek -->
                <li>
                    <a href="{{ route('admin.proyek.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.proyek.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-project-diagram w-5 mr-3"></i>
                        <span>Proyek</span>
                    </a>
                </li>

                <!-- Penerimaan -->
                <li>
                    <a href="{{ route('admin.penerimaan.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.penerimaan.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-arrow-down w-5 mr-3"></i>
                        <span>Penerimaan Dana</span>
                    </a>
                </li>

                <!-- Pengeluaran -->
                <li>
                    <a href="{{ route('admin.pengeluaran.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.pengeluaran.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-arrow-up w-5 mr-3"></i>
                        <span>Pengeluaran Dana</span>
                    </a>
                </li>

                <!-- Monitoring -->
                <li>
                    <a href="{{ route('admin.monitoring.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.monitoring.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-clipboard-check w-5 mr-3"></i>
                        <span>Monitoring</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li>
                    <a href="{{ route('admin.laporan.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.laporan.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-file-alt w-5 mr-3"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <!-- Manajemen User -->
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-slate-700 transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-slate-700' : '' }}">
                        <i class="fas fa-users-cog w-5 mr-3"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Logout -->
        <div class="border-t border-slate-700">
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <button type="button" onclick="confirmLogout()"
                    class="w-full flex items-center px-6 py-3 hover:bg-slate-700 transition-colors text-left">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

        <script>
            function confirmLogout() {
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    document.getElementById('logout-form').submit();
                }
            }
        </script>
    </div>
</aside>