@extends('layouts.app')

@section('title', $material->title . ' - LMS Pusat Pembelajaran Digital')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <ol class="flex items-center space-x-2 text-gray-600 dark:text-gray-400">
            <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a></li>
            <li>/</li>
            <li><a href="{{ route('materials.index') }}" class="hover:text-primary transition-colors">Materi</a></li>
            <li>/</li>
            <li><a href="{{ route('materials.index', ['category' => $material->category->slug]) }}" class="hover:text-primary transition-colors">{{ $material->category->name }}</a></li>
            <li>/</li>
            <li class="text-gray-900 dark:text-white font-semibold">{{ $material->title }}</li>
        </ol>
    </nav>

    <!-- Material Header -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8 border border-transparent dark:border-gray-700">
        <div class="relative h-64 md:h-96 bg-gradient-to-br from-blue-400 to-blue-600">
            @if($material->thumbnail)
            <img src="{{ asset('storage/' . $material->thumbnail) }}" 
                 alt="{{ $material->title }}" 
                 class="w-full h-full object-cover opacity-80">
            @else
            @if($material->category->image_url)
            <img src="{{ asset('storage/' . $material->category->image_url) }}" 
                 alt="{{ $material->title }}" 
                 class="w-full h-full object-cover opacity-40">
            @endif
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center p-8">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center">{{ $material->title }}</h1>
            </div>
        </div>
        
        <div class="p-8">
            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-4 mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                <span class="inline-block bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 px-4 py-2 rounded-full font-semibold">
                    📁 {{ $material->category->name }}
                </span>
                <div class="flex items-center text-yellow-500 text-xl">
                    @for($i = 0; $i < $material->rating; $i++)
                    ⭐
                    @endfor
                    <span class="text-gray-700 dark:text-gray-300 ml-2 text-base">({{ $material->rating }}/5)</span>
                </div>
                <div class="flex items-center text-gray-600 dark:text-gray-400">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $material->views }} views
                </div>
                <div class="flex items-center text-gray-600 dark:text-gray-400">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $material->created_at->diffForHumans() }}
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Deskripsi</h2>
                <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">{{ $material->description }}</p>
            </div>

            <!-- Content -->
            @if($material->content)
            <div class="mb-8 prose prose-lg dark:prose-invert max-w-none">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Konten Materi</h2>
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border dark:border-gray-700">
                    {!! $material->content !!}
                </div>
            </div>
            @endif

            <!-- Download Files -->
            @if($material->file_pdf || $material->file_ppt || $material->file_word || $material->file_video)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">File Download</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($material->file_pdf)
                    <a href="{{ asset('storage/' . $material->file_pdf) }}" 
                       target="_blank"
                       class="flex items-center p-4 bg-red-50 dark:bg-red-900/10 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/20 transition-colors border border-red-200 dark:border-red-900/30">
                        <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center text-white text-2xl mr-4">
                            📄
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200">File PDF</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk download</p>
                        </div>
                    </a>
                    @endif

                    @if($material->file_ppt)
                    <a href="{{ asset('storage/' . $material->file_ppt) }}" 
                       target="_blank"
                       class="flex items-center p-4 bg-orange-50 dark:bg-orange-900/10 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/20 transition-colors border border-orange-200 dark:border-orange-900/30">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center text-white text-2xl mr-4">
                            📊
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200">File PowerPoint</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk download</p>
                        </div>
                    </a>
                    @endif

                    @if($material->file_word)
                    <a href="{{ asset('storage/' . $material->file_word) }}" 
                       target="_blank"
                       class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/10 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/20 transition-colors border border-blue-200 dark:border-blue-900/30">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center text-white text-2xl mr-4">
                            📝
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200">File Word</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk download</p>
                        </div>
                    </a>
                    @endif

                    @if($material->file_video)
                    <a href="{{ asset('storage/' . $material->file_video) }}" 
                       target="_blank"
                       class="flex items-center p-4 bg-purple-50 dark:bg-purple-900/10 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/20 transition-colors border border-purple-200 dark:border-purple-900/30">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center text-white text-2xl mr-4">
                            🎥
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-200">File Video</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk play</p>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Related Materials -->
    @if($relatedMaterials->count() > 0)
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Materi Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedMaterials as $related)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                <div class="relative h-32 bg-gradient-to-br from-blue-400 to-blue-600">
                    @if($related->thumbnail)
                    <img src="{{ asset('storage/' . $related->thumbnail) }}" 
                         alt="{{ $related->title }}" 
                         class="w-full h-full object-cover opacity-70">
                    @else
                    @if($related->category->image_url)
                    <img src="{{ asset('storage/' . $related->category->image_url) }}" 
                         alt="{{ $related->title }}" 
                         class="w-full h-full object-cover opacity-40">
                    @endif
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 mb-2 line-clamp-2">{{ $related->title }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $related->description }}</p>
                    <a href="{{ route('materials.show', $related->slug) }}" 
                       class="text-primary hover:text-blue-700 font-semibold text-sm">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Back Button -->
    <div class="text-center">
        <a href="{{ route('materials.index', ['category' => $material->category->slug]) }}" 
           class="inline-block bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors font-semibold">
            ← Kembali ke {{ $material->category->name }}
        </a>
    </div>
</div>
@endsection
