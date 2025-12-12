@extends('layouts.app')


@section('title', 'PasalKUHP | Updated Pasal KUHP Indonesia')

@section('content')
<div class="min-h-screen" style="background: linear-gradient(180deg, #c44646 0%, #e8c4a0 40%, #8b6b7e 100%);">
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
      <section class="pt-12 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
          <div class="flex items-center justify-center gap-3">
            <img src="{{ asset('assets/img/Logo.png') }}" class="w-8 h-8 object-contain">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white">Daftar Isi Pasal Hukum</h1>
          </div>
          <p class="text-sm text-white/90 mt-3">
            Telusuri pasal-pasal hukum Indonesia secara mudah, cepat, dan terstruktur.
          </p>

          <!-- Tag pills + search -->
          <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
            <div class="flex flex-wrap gap-3 justify-center">
              <button class="px-4 py-1 rounded-full bg-white/10 text-white text-sm border border-white/20">Hukum Pidana</button>
              <button class="px-4 py-1 rounded-full bg-white/10 text-white text-sm border border-white/20">Hukum Perdata</button>
              <button class="px-4 py-1 rounded-full bg-white/10 text-white text-sm border border-white/20">Pasal Umum & Ketentuan Dasar</button>
              <button class="px-4 py-1 rounded-full bg-white/10 text-white text-sm border border-white/20">Pasal Tj Coba</button>
            </div>

            <div class="hidden lg:flex items-center gap-3">
              <div class="relative">
                <form action="{{ route('news.index') }}" method="GET">
                  <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Pasal..."
                    class="border border-slate-300 rounded-full px-4 py-2 pl-8 text-sm focus:outline-none focus:ring-primary focus:border-primary"
                  />
                </form>
              </div>
            </div>

        <!-- Content card -->
        <div class="max-w-xl mx-auto mt-10 px-2 sm:px-6">
          <div class="bg-white rounded-2xl shadow-xl p-6">

            <!-- Title -->
            <h2 class="text-4xl font-extrabold text-gray-900">Pasal 565</h2>
            <p class="text-gray-500 mt-1">Pasal Kejahatan</p>

            <!-- Big Pasal Card (Matches Image) -->
            <div class="mt-8 border-2 border-red-700 rounded-xl relative px-4 py-6">

              <!-- Label Pasal 6 -->
              <div class="absolute -top-4 left-4 bg-red-700 text-white px-4 py-1 rounded-full font-semibold shadow">
                Pasal 6
              </div>

              <!-- Status -->
              <div class="flex items-center gap-2 mt-2 mb-4">
                <span class="w-3 h-3 rounded-full bg-green-500"></span>
                <p class="text-sm font-semibold">Berlaku</p>
              </div>

              <!-- Centered Title Section -->
              <div class="text-center font-semibold mb-4">
                Buku Kesatu _ Aturan Umum <br>
                Bab 1 - Batas-Batas<br>
                Berlakunya Aturan Pidana<br>
                Dalam Perundang-undangan
              </div>

              <!-- Content -->
              <p class="text-sm leading-relaxed text-gray-700">
                Perumusan limitatif yang terbuka ini dimaksudkan untuk memberikan fleksibilitas praktik dan 
                dalam perkembangan formulasi Tindak Pidana oleh pembentuk Undang-Undang pada masa yang akan 
                datang. Fleksibilitas itu tetap dalam batas kepastian menurut ketentuan peraturan perundang-undangan...
              </p>
            </div>

            <!-- Collapsible list === MENU PASAL -->
            <div class="mt-8 space-y-4">

              <!-- PASAL 1 -->
              <div x-data="{open:false}" class="border border-red-700 rounded-xl overflow-hidden">
                <button 
                  @click="open=!open" 
                  class="w-full flex justify-between items-center bg-red-700 text-white px-4 py-2 font-semibold"
                >
                  Pasal 1
                  <span x-text="open ? '▲' : '▼'" class="text-xs"></span>
                </button>

                <div x-show="open" x-collapse class="bg-white px-4 py-3 text-sm text-gray-700">
                  Isi pasal 1 ditampilkan di sini...
                </div>
              </div>

              <!-- PASAL 2 -->
              <div x-data="{open:false}" class="border border-red-700 rounded-xl overflow-hidden">
                <button 
                  @click="open=!open" 
                  class="w-full flex justify-between items-center bg-red-700 text-white px-4 py-2 font-semibold"
                >
                  Pasal 2
                  <span x-text="open ? '▲' : '▼'" class="text-xs"></span>
                </button>

                <div x-show="open" x-collapse class="bg-white px-4 py-3 text-sm text-gray-700">
                  Isi pasal 2 ditampilkan di sini...
                </div>
              </div>

              <!-- PASAL 3 -->
              <div x-data="{open:false}" class="border border-red-700 rounded-xl overflow-hidden">
                <button 
                  @click="open=!open" 
                  class="w-full flex justify-between items-center bg-red-700 text-white px-4 py-2 font-semibold"
                >
                  Pasal 3
                  <span x-text="open ? '▲' : '▼'" class="text-xs"></span>
                </button>

                <div x-show="open" x-collapse class="bg-white px-4 py-3 text-sm text-gray-700">
                  Isi pasal 3 ditampilkan di sini...
                </div>
              </div>

            </div>

          </div>
        </div>

      </section>
    <!-- End Pasal KUHP Section-->



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

</div>
@endsection
