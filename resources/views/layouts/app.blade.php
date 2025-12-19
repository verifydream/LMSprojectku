<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LMS Pusat Pembelajaran Digital')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50" x-data="{ mobileMenuOpen: false }">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-white font-bold text-xl hover:text-gray-200 transition-colors">
                        📚 Pusat Pembelajaran
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-white hover:text-gray-200 transition-colors {{ request()->routeIs('home') ? 'font-semibold border-b-2 border-white' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('materials.index') }}" class="text-white hover:text-gray-200 transition-colors {{ request()->routeIs('materials.*') ? 'font-semibold border-b-2 border-white' : '' }}">
                        Kategori
                    </a>
                    <a href="{{ route('faq.index') }}" class="text-white hover:text-gray-200 transition-colors {{ request()->routeIs('faq.*') ? 'font-semibold border-b-2 border-white' : '' }}">
                        FAQ
                    </a>
                    <a href="/admin" class="text-white hover:text-gray-200 transition-colors">
                        Admin Panel
                    </a>
                </div>

                <!-- Search Form -->
                <div class="hidden md:flex items-center space-x-4">
                    <form action="{{ request()->url() }}" method="GET" class="flex items-center">
                        <input 
                            type="search" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Cari materi..." 
                            class="px-4 py-2 rounded-l-lg border-2 border-white focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-800"
                        >
                        <button type="submit" class="bg-white text-primary px-4 py-2 rounded-r-lg hover:bg-gray-100 transition-colors font-semibold">
                            Cari
                        </button>
                    </form>
                    <a href="https://wa.me/+6282290279052" target="_blank" class="text-white hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden pb-4">
                <a href="{{ route('home') }}" class="block text-white py-2 hover:bg-blue-600 px-4 rounded">Home</a>
                <a href="{{ route('materials.index') }}" class="block text-white py-2 hover:bg-blue-600 px-4 rounded">Kategori</a>
                <a href="{{ route('faq.index') }}" class="block text-white py-2 hover:bg-blue-600 px-4 rounded">FAQ</a>
                <a href="/admin" class="block text-white py-2 hover:bg-blue-600 px-4 rounded">Admin Panel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">Pusat Pembelajaran Digital</h3>
                    <p class="text-gray-300">Platform pembelajaran digital untuk materi kepabeanan dan bea cukai Indonesia.</p>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="{{ route('materials.index') }}" class="text-gray-300 hover:text-white">Kategori</a></li>
                        <li><a href="{{ route('faq.index') }}" class="text-gray-300 hover:text-white">FAQ</a></li>
                        <li><a href="/admin" class="text-gray-300 hover:text-white">Admin Panel</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Kontak</h3>
                    <p class="text-gray-300">WhatsApp: +62 822 9027 9052</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} LMS Pusat Pembelajaran Digital. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                mobileMenuOpen: false
            }))
        })
    </script>
</body>
</html>
