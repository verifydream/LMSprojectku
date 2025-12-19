@extends('layouts.app')

@section('title', 'Kategori Materi - LMS Pusat Pembelajaran Digital')

@section('content')
<div x-data="{ selectedCategory: '{{ request('category', 'all') }}' }">
    <h1 class="text-4xl font-bold mb-8 text-gray-800">Kategori Materi Pembelajaran</h1>

    <!-- Category Pills -->
    <div class="mb-8 overflow-x-auto">
        <div class="flex space-x-3 pb-4">
            <a href="{{ route('materials.index') }}" 
               class="px-6 py-3 rounded-full font-semibold whitespace-nowrap transition-colors {{ !request('category') || request('category') == 'all' ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('materials.index', ['category' => $category->slug]) }}" 
               class="px-6 py-3 rounded-full font-semibold whitespace-nowrap transition-colors {{ request('category') == $category->slug ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-8">
        <form action="{{ route('materials.index') }}" method="GET" class="max-w-2xl">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="flex">
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari materi..." 
                    class="flex-1 px-6 py-3 rounded-l-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-r-lg hover:bg-blue-700 transition-colors font-semibold">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Materials Grid -->
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
                    <div class="flex items-center space-x-4 text-gray-500 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ $material->views }}
                        </div>
                        @if($material->is_active)
                        <span class="text-green-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Aktif
                        </span>
                        @endif
                    </div>
                    <a href="{{ route('materials.show', $material->slug) }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $materials->appends(request()->query())->links() }}
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak ada materi ditemukan</h3>
        <p class="text-gray-600 mb-4">Coba kategori atau kata kunci lain</p>
        <a href="{{ route('materials.index') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
            Lihat Semua Materi
        </a>
    </div>
    @endif
</div>
@endsection
