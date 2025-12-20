@extends('layouts.app')


@section('title', 'PasalKUHP | Updated Pasal KUHP Indonesia')

@section('content')
<div class="min-h-screen" style="background: linear-gradient(180deg, #c44646 0%, #e8c4a0 40%, #6c5463 100%);">
    <!-- PASAL KUHP SECTION -->
      <section class="pasal-section">

        <!-- HEADER -->
        <div class="pasal-header">
          <div class="pasal-title-wrap">
            <img src="{{ asset('assets/img/Logo.png') }}" class="pasal-logo">
            <h1>Daftar Isi Pasal Hukum</h1>
          </div>
          <p>Telusuri pasal-pasal hukum Indonesia secara mudah, cepat, dan terstruktur.</p>

          <!-- FILTER -->
          <div class="pasal-filters">
            <button class="pasal-pill active">Hukum Pidana</button>
            <button class="pasal-pill">Hukum Perdata</button>
            <button class="pasal-pill">Ketentuan Umum</button>
            <button class="pasal-pill">Percobaan</button>
          </div>

          <!-- SEARCH -->
          <form class="pasal-search">
            <input type="text" placeholder="Cari pasal (contoh: Pasal 565)">
          </form>
        </div>

        <!-- PASAL CARD -->
        <div class="pasal-card">

          <h2>Pasal 565</h2>
          <span class="subtitle">Pasal Kejahatan</span>

          <!-- PASAL UTAMA -->
          <div class="pasal-main-box">
            <span class="label">Pasal 6</span>

            <div class="pasal-status">
              <span class="dot"></span>
              Berlaku
            </div>

            <div class="pasal-meta">
              Buku Kesatu – Aturan Umum<br>
              Bab I – Batas-Batas Berlakunya Aturan Pidana
            </div>

            <p>
              Perumusan limitatif yang terbuka ini dimaksudkan untuk memberikan fleksibilitas praktik
              dalam perkembangan formulasi tindak pidana.
            </p>
          </div>

          <!-- ACCORDION PASAL -->
          <div class="pasal-accordion-list">

            <div x-data="{open:false}" class="pasal-accordion">
              <button @click="open = !open">
                Pasal 1
                <span x-text="open ? '−' : '+'"></span>
              </button>
              <div x-show="open" x-collapse class="pasal-content">
                Isi pasal 1 ditampilkan di sini...
              </div>
            </div>

            <div x-data="{open:false}" class="pasal-accordion">
              <button @click="open = !open">
                Pasal 2
                <span x-text="open ? '−' : '+'"></span>
              </button>
              <div x-show="open" x-collapse class="pasal-content">
                Isi pasal 2 ditampilkan di sini...
              </div>
            </div>

            <div x-data="{open:false}" class="pasal-accordion">
              <button @click="open = !open">
                Pasal 3
                <span x-text="open ? '−' : '+'"></span>
              </button>
              <div x-show="open" x-collapse class="pasal-content">
                Isi pasal 3 ditampilkan di sini...
              </div>
            </div>

          </div>
        </div>

      </section>
    <!-- END PASAL KUHP -->



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
              <p class="text-slate-700 text-base mt-1">{{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y') }}</p>
            </a>
          </div>

          <!-- Berita 1 -->
          @foreach ($news->skip(1)->take(3) as $new)
              <a href="{{ route('news.show', $new->slug) }}"
                class="relative col-span-5 flex flex-col h-fit md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
                <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm">
                  {{ $new->newsCategory->title }}
                </div>
                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="berita2" class="rounded-xl md:max-h-48" 
                  style="width: 250px; object-fit: cover;">
                <div class="mt-2 md:mt-0 items-center">
                  <p class="font-semibold text-lg">{{ \Str::limit($new->title, 80) }}</p>
                  <p class="text-slate-500 text-base mt-1">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y') }}</p>
                </div>
              </a>
          @endforeach
        </div>
      </div>
    <!-- End Berita Terbaru -->

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
                  <p class="text-slate-700">{{ $author->news->count() }} Berita</p>
                </div>
              </a>
          @endforeach
          
        </div>
      </div>
    <!-- End Author -->

    <!-- Berita Unggulan -->
      <div class="flex flex-col px-14 mt-10">
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
      </div>
    <!-- End Berita Unggulan -->
</div>
@endsection
