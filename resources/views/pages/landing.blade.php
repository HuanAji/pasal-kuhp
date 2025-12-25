@extends('layouts.app')

@section('title', 'PasalKUHP | Updated Pasal KUHP Indonesia')

@section('content')
<div class="min-h-screen" style="background: linear-gradient(180deg, #c44646 0%, #e8c4a0 40%, #6c5463 100%);">
    <!-- HEADER Title Pasal -->
        <header class="navbar-pasal">
            <div class="navbar-container">
                <!-- Judul -->
                <div class="navbar-title">
                    <img src="{{ asset('assets/img/Logo.png') }}" alt="Logo" class="navbar-logo">
                        <h1>Daftar Isi Pasal Hukum</h1>
                </div>

                <!-- Subtitle -->
                    <p class="navbar-subtitle">
                        Telusuri pasal-pasal hukum Indonesia secara mudah, cepat, dan terstruktur.
                    </p>
            </div>
                <div class="category-buttons">
                    <button class="category-btn active" data-category="all">Semua Pasal</button>
                    @foreach($pasalCategories as $category)
                        <button class="category-btn" data-category="{{ $category->slug }}">{{ $category->title }}</button>
                    @endforeach
                </div>
        </header>
    <!-- END HEADER Title Pasal -->

    <!-- PASAL KUHP SECTION -->
        <section class="pasal-section-container">
            <div class="container-pasal"><div class="content-pasal">
                    <div class="search-container">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" id="searchInput" placeholder="Cari pasal atau kata kunci...">
                        </div>
                        <div class="quick-search">  
                            <span class="quick-search-label">Cari cepat:</span>
                            @foreach($pasals->take(3) as $pasal)
                                <button 
                                 class="quick-btn" data-search="{{ $pasal->nomor_pasal }}">{{ $pasal->nomor_pasal }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="instructions">
                        <i class="fas fa-info-circle"></i> Klik pada judul pasal untuk membuka atau menutup isi pasal. Filter pasal berdasarkan kategori atau gunakan fitur pencarian.
                    </div>
                    
                    <div class="pasal-list" id="pasalList">
                        @foreach($pasals as $pasal)
                            <div class="pasal-item" data-category="{{ $pasal->category->slug }}" data-pasal="{{ $pasal->nomor_pasal }}">
                                <div class="pasal-header" data-pasal="pasal{{ $pasal->id }}">
                                    <div>
                                        <div class="pasal-title">
                                            <span class="status-dot" style="background-color: {{ $pasal->status_pasal->getHexColor() }}"></span>
                                            {{ $pasal->nomor_pasal }}
                                        </div>
                                        <div class="pasal-subtitle">{{ $pasal->category->title }}</div>
                                    </div>
                                    <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="pasal-content" id="pasal{{ $pasal->id }}">
                                    <div class="pasal-body">
                                        <div class="pasal-text">
                                            <!-- Status Badge -->
                                            <div class="badge-status mb-3">
                                                <span class="status-dot" style="background-color: {{ $pasal->status_pasal->getHexColor() }}"></span>
                                                <span class="status-text">{{ $pasal->status_pasal->getLabel() }}</span>
                                                <span class="mx-2">•</span>
                                                <span class="text-sm text-gray-600">Berlaku sejak {{ $pasal->tanggal_berlaku->format('d M Y') }}</span>
                                            </div>
                                            
                                            <!-- Isi Pasal -->
                                            <div class="pasal-content-text">
                                                {!! $pasal->isi_pasal !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="no-results" id="noResults" style="display: none;">
                        <i class="fas fa-search"></i>
                        <h3>Pasal tidak ditemukan</h3>
                        <p>Tidak ada pasal yang sesuai dengan pencarian Anda. Coba gunakan kata kunci lain.</p>
                    </div>
                </div>
                
                <div class="footer-pasal">
                    <p>Dokumen hukum ini disajikan untuk tujuan informasi dan referensi.</p>
                    <p>© {{ date('Y') }} Daftar Isi Pasal Hukum Indonesia</p>
                </div>
            </div>
        </section>
    <!-- END PASAL KUHP SECTION -->

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
                        <p class="text-slate-800 text-base mt-1">{{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y') }}</p>
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
        <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10 mb-10">
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
            <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4 mb-10">
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