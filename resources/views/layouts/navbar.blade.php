<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Left Side - Logo & Company Name -->
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-slate-700 rounded-lg flex items-center justify-center">
                <i class="fas fa-building text-white text-lg"></i>
            </div>
            <span class="text-xl font-bold text-gray-800">PT. SUKA TEKNIK PROPERTI</span>
        </div>

        <!-- Right Side - User Profile & Actions -->
        <div class="flex items-center space-x-4">
            <!-- Notifications -->
            <button class="relative p-2 text-gray-500 hover:bg-gray-100 rounded-full transition-colors">
                <i class="fas fa-bell"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-600 rounded-full"></span>
            </button>

            <!-- User Dropdown -->
            <div class="relative">
                <button id="userMenuButton" class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="text-left hidden sm:block">
                        <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->role ?? 'admin' }}</p>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-sm ml-2"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user-circle mr-2"></i> Profil
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-cog mr-2"></i> Pengaturan
                    </a>
                    <hr class="my-2 border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('userMenuButton').addEventListener('click', function() {
        document.getElementById('userDropdown').classList.toggle('hidden');
    });

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('userDropdown');
        const button = document.getElementById('userMenuButton');
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>