@extends('layouts.app')

@section('title', 'PasalKUHP | Updated Pasal KUHP Indonesia')

@section('content')
      <!-- swiper -->
    <div class="swiper mySwiper mt-9">
      <div class="swiper-wrapper">
        @foreach ($banners as $banner)
          <div class="swiper-slide">
            <a href="{{ route('news.show', $banner->news->slug) }}" class="block">
              <div
                class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden" style="background-image: url('{{ asset('storage/' . $banner->news->thumbnail) }}');">
                <div
                  class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0)] rounded-b-xl">
                </div>
                <div class="relative z-10 mb-3" style="padding-left: 10px;">
                  <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">{{ $banner->news->newsCategory->title }}</div>
                  <p class="text-3xl font-semibold text-white mt-1">{{ $banner->news->title }}</p>
                  <div class="flex items-center gap-1 mt-1">
                    <img src="{{ asset('storage/' . $banner->news->author->avatar) }}" alt="" class="w-5 h-5 rounded-full object-cover">
                    <p class="text-white text-xs">{{ $banner->news->author->name }}</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
    <!-- End Swiper -->

    <!--Pasal KUHP Section-->
    <div class="flex flex-col px-4 sm:px-6 md:px-10 lg:px-14 mt-10 mb-10">
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Main Content - Pasal -->
        <div class="flex-1 lg:w-2/3">
            <!-- Header dengan Search -->
            <div class="bg-red-700 text-white p-4 rounded-t-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium">Pasal 1</span>
                </div>
                <div class="relative">
                    <input
                        type="text"
                        id="searchPasal"
                        placeholder="Pasal 565..."
                        class="w-full px-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-400"
                    />
                    <svg class="absolute right-3 top-2.5 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Content Box -->
            <div class="bg-white border-2 border-gray-200 rounded-b-lg shadow-lg">
                
                <!-- Loading State (Hide after loaded) -->
                <div id="loadingState" class="p-6 sm:p-8 text-center">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-red-700 mb-3"></div>
                    <p class="text-gray-600">Seianggannya...</p>
                </div>

                <!-- Pasal Content -->
                <div id="pasalContent" class="hidden">
                    <!-- Pasal Number Badge -->
                    <div class="px-6 sm:px-8 pt-6">
                        <div class="bg-red-700 text-white inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium mb-6">
                            <span class="mr-2">▲</span>
                            Pasal {{ $pasal->nomor ?? '565' }}
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="px-6 sm:px-8 pb-8">
                        <!-- Status Badge -->
                        <div class="flex items-center mb-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Berlaku
                            </span>
                        </div>

                        <!-- Judul Buku/Aturan -->
                        <div class="mb-6">
                            <h3 class="text-lg sm:text-xl font-bold text-center mb-2">
                                {{ $pasal->buku ?? 'Buku Kesatu_ Aturan Umum' }}
                            </h3>
                        </div>

                        <!-- Bab -->
                        <div class="mb-6">
                            <h4 class="text-base sm:text-lg font-semibold text-center leading-relaxed">
                                {{ $pasal->bab ?? 'Bab 1 - Batas-Batas Berlakunya Aturan Pidana Dalam Perundang-undangan' }}
                            </h4>
                        </div>

                        <!-- Isi Pasal -->
                        <div class="text-gray-800 leading-relaxed text-justify text-sm sm:text-base space-y-4">
                            {!! nl2br(e($pasal->isi ?? '')) !!}
                            
                            @if(isset($pasal->ayat) && count($pasal->ayat) > 0)
                                @foreach($pasal->ayat as $ayat)
                                    <div class="mt-4">
                                        <p class="font-semibold mb-2">Ayat {{ $ayat->nomor }}</p>
                                        <p>{{ $ayat->isi }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Additional Info (Optional) -->
                        @if(isset($pasal->penjelasan))
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <h5 class="font-semibold mb-2 text-gray-700">Penjelasan:</h5>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $pasal->penjelasan }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar - Berita Terbaru -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 sticky top-4">
                <!-- Header Berita -->
                <div class="bg-red-700 text-white px-6 py-4 rounded-t-lg">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                        <h3 class="font-bold text-lg">Berita Terbaru</h3>
                    </div>
                </div>

                <!-- List Berita -->
                <div class="divide-y divide-gray-200">
                    @forelse($beritaTerbaru ?? [] as $berita)
                    <a href="{{ route('berita.show', $berita->id) }}" class="block p-4 hover:bg-gray-50 transition duration-200">
                        <div class="flex items-center mb-3">
                            <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                            <span class="text-xs text-gray-500">Berita Terbaru</span>
                        </div>
                        
                        <!-- Gambar Berita -->
                        <div class="mb-3 rounded-lg overflow-hidden">
                            <img 
                                src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/400x250' }}" 
                                alt="{{ $berita->judul }}"
                                class="w-full h-48 object-cover hover:scale-105 transition duration-300"
                            />
                        </div>

                        <!-- Judul Berita -->
                        <h4 class="font-semibold text-gray-800 mb-2 line-clamp-2 hover:text-red-700 transition">
                            {{ $berita->judul }}
                        </h4>

                        <!-- Waktu -->
                        <div class="flex items-center text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $berita->created_at->diffForHumans() }}
                        </div>
                    </a>
                    @empty
                    <div class="p-6 text-center text-gray-500">
                        <p>Belum ada berita terbaru</p>
                    </div>
                    @endforelse
                </div>

                <!-- Link Lihat Semua -->
                @if(isset($beritaTerbaru) && count($beritaTerbaru) > 0)
                <div class="p-4 bg-gray-50 rounded-b-lg">
                    <a href="{{ route('berita.index') }}" class="block text-center text-red-700 font-semibold hover:text-red-800 transition">
                        Lihat Semua Berita →
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Simulate loading
    setTimeout(() => {
        document.getElementById('loadingState').classList.add('hidden');
        document.getElementById('pasalContent').classList.remove('hidden');
    }, 1000);

    // Search functionality (optional)
    document.getElementById('searchPasal').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const searchValue = this.value;
            window.location.href = `/pasal/search?q=${searchValue}`;
        }
    });
</script>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>


    <!-- Berita Unggulan -->
    <div class="flex flex-col px-14 mt-10 ">
      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Berita Unggulan</p>
          <p>Untuk Kamu</p>
        </div>
        <a href="{{ route('news.index') }}"
          class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0 h-fit">
          Lihat Semua
        </a>
      </div>
      <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
        @foreach ($featureds as $featured)
          <a href="{{ route('news.show', $featured-> slug) }}">
            <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height:100%">
              <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                {{ $featured->newsCategory->title }}
              </div>
              <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="" class="w-full rounded-xl mb-3" style="height: 150px; object-fit: cover;">
              <p class="font-bold text-base mb-1">{{ \Str::limit($featured->title, 50) }} </p>
              <p class="text-slate-400">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}</p>
            </div>
          </a>
        @endforeach
      </div>
    
    <!-- Berita Terbaru -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
      <div class="flex flex-col md:flex-row w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Berita Terbaru</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Berita Utama -->
        <div
          class="relative col-span-7 lg:row-span-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
          <a href="{{ route('news.show', $news[0]->slug) }}">
            <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-5 mt-5 absolute">{{ $news[0]->newsCategory->title }}
            </div>
            <img src="{{ asset('storage/' . $news[0]->thumbnail) }}" alt="berita1" class="rounded-2xl">
            <p class="font-bold text-xl mt-3">
              {{ $news[0]->title }}
            </p>
            <p class="text-slate-400 text-base mt-1">
              {!! \Str::limit($news[0]->content, 10) !!}
            </p>
            <p class="text-slate-400 text-base mt-1">{{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y') }}</p>
          </a>
        </div>

        <!-- Berita 1 -->
        @foreach ($news->skip(1) as $new)
            <a href="{{ route('news.show', $new->slug) }}"
              class="relative col-span-5 flex flex-col h-fit md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
              <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm">
                {{ $new->newsCategory->title }}
              </div>
              <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="berita2" class="rounded-xl md:max-h-48" 
                style="width: 250px; object-fit: cover;">
              <div class="mt-2 md:mt-0">
                <p class="font-semibold text-lg">{{ $new->title }}</p>
                <p class="text-slate-400 mt-3 text-sm font-normal">{!! \Str::limit($new->content, 100) !!}</p>
              </div>
            </a>
        @endforeach
      </div>
    </div>


    <!-- Author -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Kenali Author</p>
          <p>Terbaik Dari Kami</p>
        </div>
      </div>
      <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Author 1 -->
        @foreach ($authors as $author)
          <a href="{{ route('author.show', $author->username) }}">
              <div  
                class="flex flex-col items-center border border-slate-200 px-4 py-8 rounded-2xl hover:border-primary hover:cursor-pointer">
                <img src="{{ asset('storage/' . $author->avatar) }}" alt="" class="rounded-full w-24 h-24">
                <p class="font-bold text-xl mt-4">{{ $author->name }}</p>
                <p class="text-slate-400">{{ $author->news->count() }} Berita</p>
              </div>
            </a>
        @endforeach
        
      </div>
    </div>
    <!-- End Author -->

    <!-- Pilihan Author -->
    <div class="flex flex-col px-14 mt-10 mb-10">
      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Pilihan Author</p>
        </div>
      </div>
      <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
        @foreach ($news as $choice)
          <a href="{{ route('news.show', $choice->slug) }}">
          <div
            class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height: 100%">
            <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
              {{ $choice->newsCategory->title }}</div>
            <img src="{{ asset('storage/' . $choice->thumbnail) }}" alt="" class="w-full rounded-xl mb-3" style="height: 200px; object-fit: cover;">
            <p class="font-bold text-base mb-1">{{ $choice->title }}</p>
            <p class="text-slate-400">{{ \Carbon\Carbon::parse($choice->created_at)->format('d F Y') }}</p>
          </div>
        </a>
        @endforeach
        
        
      </div>
    </div>
    <!-- End Pilihan Author -->
@endsection
