@extends('layouts.app')

@section('title', 'FAQ - LMS Pusat Pembelajaran Digital')

@section('content')
<div x-data="faq()" class="max-w-5xl mx-auto">
    <h1 class="text-4xl font-bold mb-8 text-gray-800 dark:text-gray-100">Frequently Asked Questions (FAQ)</h1>

    <!-- Search Bar -->
    <div class="mb-8">
        <form action="{{ route('faq.index') }}" method="GET">
            <div class="flex">
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari pertanyaan..." 
                    class="flex-1 px-6 py-3 rounded-l-lg border-2 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-r-lg hover:bg-blue-700 transition-colors font-semibold">
                    Cari
                </button>
            </div>
        </form>
    </div>

    @if($faqs->count() > 0)
    <!-- FAQ List -->
    <div class="space-y-4">
        @foreach($faqs as $faq)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-transparent dark:border-gray-700">
            <button 
                @click="toggleFaq({{ $faq->id }})"
                class="w-full text-left px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 pr-4">{{ $faq->question }}</h3>
                    <svg 
                        class="w-6 h-6 text-gray-600 dark:text-gray-400 transition-transform duration-200"
                        :class="{ 'rotate-180': openFaqs.includes({{ $faq->id }}) }"
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </button>
            <div 
                x-show="openFaqs.includes({{ $faq->id }})"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="px-6 pb-6"
                style="display: none;">
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <div class="prose prose-blue dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-12 text-center border dark:border-gray-700">
        <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">Tidak ada FAQ ditemukan</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-4">Coba kata kunci lain</p>
        <a href="{{ route('faq.index') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
            Lihat Semua FAQ
        </a>
    </div>
    @endif

    <!-- Contact Section -->
    <div class="mt-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-xl p-8 text-white">
        <h2 class="text-2xl font-bold mb-4">Masih ada pertanyaan?</h2>
        <p class="mb-6 text-blue-100">Hubungi kami melalui WhatsApp untuk mendapatkan bantuan lebih lanjut</p>
        <a href="https://wa.me/+6282290279052" 
           target="_blank"
           class="inline-flex items-center bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors font-semibold">
            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
            Hubungi via WhatsApp
        </a>
    </div>
</div>

<script>
function faq() {
    return {
        openFaqs: [],
        toggleFaq(id) {
            if (this.openFaqs.includes(id)) {
                this.openFaqs = this.openFaqs.filter(faqId => faqId !== id);
            } else {
                this.openFaqs.push(id);
            }
        }
    }
}
</script>
@endsection
