@extends('layouts.app')

@section('title', 'Home - LMS Pusat Pembelajaran Digital')

@section('content')
<div x-data="app()">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-xl p-8 md:p-12 mb-8 text-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Pusat Pembelajaran Digital</h1>
        <p class="text-xl md:text-2xl mb-6">Platform pembelajaran untuk materi kepabeanan dan bea cukai Indonesia</p>
        <a href="{{ route('materials.index') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors shadow-lg">
            Jelajahi Materi
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-8">
        <form action="{{ route('home') }}" method="GET" class="max-w-2xl mx-auto">
            <div class="flex">
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari materi pembelajaran..." 
                    class="flex-1 px-6 py-4 rounded-l-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg"
                >
                <button type="submit" class="bg-primary text-white px-8 py-4 rounded-r-lg hover:bg-blue-700 transition-colors font-semibold text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Categories Quick Links -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Kategori Pembelajaran</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($categories as $category)
            <a href="{{ route('materials.index', ['category' => $category->slug]) }}" 
               class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 text-center group">
                @if($category->image_url)
                <img src="{{ asset('storage/' . $category->image_url) }}" 
                     alt="{{ $category->name }}" 
                     class="w-16 h-16 mx-auto mb-3 rounded-full object-cover group-hover:scale-110 transition-transform">
                @else
                <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold group-hover:scale-110 transition-transform">
                    {{ substr($category->name, 0, 1) }}
                </div>
                @endif
                <h3 class="font-semibold text-gray-800 group-hover:text-primary transition-colors">{{ $category->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $category->materials_count ?? 0 }} materi</p>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Materials Grid -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Materi Terbaru</h2>
            @if(request('search'))
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                Reset Pencarian
            </a>
            @endif
        </div>

        @if($materials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($materials as $material)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 overflow-hidden">
                    @if($material->thumbnail)
                    <img src="{{ asset('storage/' . $material->thumbnail) }}" 
                         alt="{{ $material->title }}" 
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    @else
                    @if($material->category->image_url)
                    <img src="{{ asset('storage/' . $material->category->image_url) }}" 
                         alt="{{ $material->title }}" 
                         class="w-full h-full object-cover opacity-50 hover:scale-110 transition-transform duration-300">
                    @endif
                    @endif
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <h3 class="text-white text-xl font-bold text-center px-4">{{ $material->title }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full font-semibold">
                            {{ $material->category->name }}
                        </span>
                        <div class="flex items-center text-yellow-500">
                            @for($i = 0; $i < $material->rating; $i++)
                            ⭐
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $material->description }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ $material->views }} views
                        </div>
                        <a href="{{ route('materials.show', $material->slug) }}" 
                           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $materials->links() }}
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak ada materi ditemukan</h3>
            <p class="text-gray-600 mb-4">Coba kata kunci lain atau jelajahi semua materi</p>
            <a href="{{ route('materials.index') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                Jelajahi Semua Materi
            </a>
        </div>
        @endif
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Materi Lengkap</h3>
            <p class="text-gray-600">Akses materi pembelajaran yang komprehensif dan mudah dipahami</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Gratis & Mudah</h3>
            <p class="text-gray-600">Akses gratis ke semua materi tanpa biaya pendaftaran</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Update Berkala</h3>
            <p class="text-gray-600">Materi selalu diperbarui mengikuti perkembangan terbaru</p>
        </div>
    </div>
</div>

<script>
function app() {
    return {
        // Add any Alpine.js data here
    }
}
</script>
@endsection
