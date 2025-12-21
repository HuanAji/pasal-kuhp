@extends('layouts.app')


@section('title', 'PasalKUHP | Updated Pasal KUHP Indonesia')

@section('content')
<div class="min-h-screen" style="background: linear-gradient(180deg, #c44646 0%, #e8c4a0 40%, #6c5463 100%);">
    <!-- PASAL KUHP SECTION -->
    <section class="pasal-section-container">
        <div class="container-pasal">
            <header class="header-pasal">
                <div class="pasal-title-wrap">
                    <img src="{{ asset('assets/img/Logo.png') }}" class="pasal-logo">
                    <h1>Daftar Isi Pasal Hukum</h1>
                </div>
                <p class="subtitle-pasal">Telusuri pasal-pasal hukum Indonesia secara mudah, cepat, dan terstruktur.</p>             
            </header>
            
            <div class="content-pasal">
                <div class="search-container">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" placeholder="Cari pasal atau kata kunci...">
                    </div>
                    <div class="quick-search">
                        <span class="quick-search-label">Cari cepat:</span>
                        <button class="quick-btn" data-search="565">Pasal 565</button>
                        <button class="quick-btn" data-search="pidana">Hukum Pidana</button>
                        <button class="quick-btn" data-search="perdata">Hukum Perdata</button>
                    </div>
                </div>
                
                <div class="category-buttons">
                    <button class="category-btn active" data-category="all">Semua Pasal</button>
                    <button class="category-btn" data-category="pidana">Hukum Pidana</button>
                    <button class="category-btn" data-category="perdata">Hukum Perdata</button>
                    <button class="category-btn" data-category="umum">Pasal Umum & Ketentuan Dasar</button>
                    <button class="category-btn" data-category="uji">Pasal Uji Coba</button>
                </div>
                
                <div class="instructions">
                    <i class="fas fa-info-circle"></i> Klik pada judul pasal untuk membuka atau menutup isi pasal. Filter pasal berdasarkan kategori atau gunakan fitur pencarian.
                </div>
                
                <div class="pasal-list" id="pasalList">
                    <!-- Pasal 565 - Diperbaiki -->
                    <div class="pasal-item" data-category="pidana" data-pasal="565">
                        <div class="pasal-header" data-pasal="pasal565">
                            <div>
                                <div class="pasal-title">Pasal 565</div>
                                <div class="pasal-subtitle">Pasal Kejahatan</div>
                            </div>
                            <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="pasal-content" id="pasal565">
                            <div class="pasal-body">
                                <!-- Sub Pasal 6 -->
                                <div class="sub-pasal">
                                    <h3 class="sub-pasal-title">Pasal 6</h3>
                                    <div class="sub-pasal-info">
                                        <div class="badge-status">
                                            <span class="status-dot"></span>
                                            <span class="status-text">Berlaku</span>
                                        </div>
                                        <div class="book-info">
                                            <i class="fas fa-book"></i>
                                            Buku Kesatu - Aturan Umum
                                        </div>
                                    </div>
                                    
                                    <div class="chapter-info">
                                        <i class="fas fa-file-alt"></i>
                                        <em>Bab 1 - Batas-Batas Berlakunya Aturan Pidana Dalam Perundang-undangan</em>
                                    </div>
                                    
                                    <div class="pasal-text">
                                        <p>Perumusan limitatif yang terbuka ini dimaksudkan untuk memberikan fleksibilitas praktik dan dalam perkembangan formulasi Tindak Pidana oleh pembentuk Undang-Undang pada masa yang akan datang. Fleksibilitas itu tetap dalam batas kepastian menurut ketentuan perundang-undangan.</p>
                                        
                                        <p>Penentuan Tindak Pidana yang menyerang kepentingan nasional hanya terbatas pada perbuatan tertentu yang sungguh-sungguh melanggar kepentingan hukum nasional yang dilindungi. Pelaku hanya dituntut atas Tindak Pidana menurut hukum pidana Indonesia.</p>
                                        
                                        <p>Pelaku Tindak Pidana yang dikenai ketentuan ini adalah setiap Orang, baik warga negara Indonesia maupun orang asing, yang melakukan Tindak Pidana di luar wilayah Negara Kesatuan Republik Indonesia. Alasan penerapan asas nasional pasif, karena pada umumnya Tindak Pidana yang merupakan kepentingan hukum suatu negara, oleh negara tempat Tindak Pidana dilakukan tidak selalu dianggap...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pasal 1 - Diperbaiki -->
                    <div class="pasal-item" data-category="umum" data-pasal="1">
                        <div class="pasal-header" data-pasal="pasal1">
                            <div>
                                <div class="pasal-title">Pasal 1</div>
                                <div class="pasal-subtitle">Aturan Umum</div>
                            </div>
                            <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="pasal-content" id="pasal1">
                            <div class="pasal-body">
                                <div class="pasal-text">
                                    <p><strong>Pasal 1 - Aturan Umum</strong></p>
                                    
                                    <p>Pasal ini berisi aturan umum yang menjadi dasar penerapan hukum pidana di Indonesia. Pasal 1 menjelaskan prinsip-prinsip dasar yang harus diikuti dalam menafsirkan dan menerapkan ketentuan pidana lainnya.</p>
                                    
                                    <div class="pasal-principle">
                                        <h4><i class="fas fa-balance-scale"></i> Asas Legalitas</h4>
                                        <p>Asas legalitas yang tercantum dalam Pasal 1 menyatakan bahwa tidak ada perbuatan yang dapat dipidana kecuali berdasarkan ketentuan perundang-undangan yang telah ada sebelum perbuatan dilakukan.</p>
                                    </div>
                                    
                                    <div class="pasal-principle">
                                        <h4><i class="fas fa-shield-alt"></i> Perlindungan Hukum</h4>
                                        <p>Ketentuan ini menjamin kepastian hukum dan melindungi warga negara dari penerapan hukum pidana yang sewenang-wenang atau retroaktif.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pasal 2 - Diperbaiki -->
                    <div class="pasal-item" data-category="umum" data-pasal="2">
                        <div class="pasal-header" data-pasal="pasal2">
                            <div>
                                <div class="pasal-title">Pasal 2</div>
                                <div class="pasal-subtitle">Ketentuan Umum</div>
                            </div>
                            <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="pasal-content" id="pasal2">
                            <div class="pasal-body">
                                <div class="pasal-text">
                                    <p><strong>Pasal 2 - Ketentuan Umum</strong></p>
                                    
                                    <p>Pasal 2 mengatur tentang berlakunya hukum pidana Indonesia bagi setiap orang yang melakukan tindak pidana di wilayah negara Republik Indonesia.</p>
                                    
                                    <div class="jurisdiction-info">
                                        <h4><i class="fas fa-globe-asia"></i> Yurisdiksi Teritorial</h4>
                                        <p>Asas teritorial yang menjadi prinsip utama dalam pasal ini menegaskan bahwa hukum pidana Indonesia berlaku bagi siapa saja yang melakukan tindak pidana di wilayah Indonesia, tanpa memandang kewarganegaraan pelaku.</p>
                                    </div>
                                    
                                    <div class="jurisdiction-info">
                                        <h4><i class="fas fa-user-tie"></i> Asas Nasional Aktif dan Pasif</h4>
                                        <p>Ketentuan dalam pasal ini juga mengatur mengenai penerapan hukum pidana Indonesia terhadap warga negara yang melakukan tindak pidana di luar wilayah Indonesia, dengan memperhatikan asas nasional aktif dan pasif.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pasal 3 - Diperbaiki -->
                    <div class="pasal-item" data-category="umum" data-pasal="3">
                        <div class="pasal-header" data-pasal="pasal3">
                            <div>
                                <div class="pasal-title">Pasal 3</div>
                                <div class="pasal-subtitle">Lingkup Berlakunya Hukum Pidana</div>
                            </div>
                            <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="pasal-content" id="pasal3">
                            <div class="pasal-body">
                                <div class="pasal-text">
                                    <p><strong>Pasal 3 - Lingkup Berlakunya Hukum Pidana</strong></p>
                                    
                                    <p>Pasal 3 menjelaskan lingkup berlakunya hukum pidana Indonesia, termasuk ketentuan tentang waktu dan tempat terjadinya tindak pidana.</p>
                                    
                                    <div class="scope-info">
                                        <h4><i class="fas fa-ship"></i> Kapal dan Pesawat</h4>
                                        <p>Pasal ini mengatur mengenai penerapan hukum pidana Indonesia terhadap tindak pidana yang dilakukan di kapal berbendera Indonesia atau pesawat terbang yang terdaftar di Indonesia, di manapun berada.</p>
                                    </div>
                                    
                                    <div class="scope-info">
                                        <h4><i class="fas fa-gavel"></i> Yurisdiksi Ekstrateritorial</h4>
                                        <p>Ketentuan dalam pasal ini penting untuk menjamin penegakan hukum terhadap tindak pidana yang dilakukan di luar wilayah teritorial Indonesia namun masih dalam yurisdiksi negara berdasarkan prinsip-prinsip hukum internasional.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pasal 6 - Diperbaiki -->
                    <div class="pasal-item" data-category="pidana" data-pasal="6">
                        <div class="pasal-header" data-pasal="pasal6">
                            <div>
                                <div class="pasal-title">Pasal 6</div>
                                <div class="pasal-subtitle">Aturan Khusus Tindak Pidana</div>
                            </div>
                            <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="pasal-content" id="pasal6">
                            <div class="pasal-body">
                                <div class="pasal-text">
                                    <p><strong>Pasal 6 - Aturan Khusus Tindak Pidana</strong></p>
                                    
                                    <p>Pasal 6 merupakan bagian dari Buku Kesatu tentang Aturan Umum dalam hukum pidana Indonesia.</p>
                                    
                                    <div class="regulation-info">
                                        <h4><i class="fas fa-expand-alt"></i> Fleksibilitas Praktik</h4>
                                        <p>Perumusan terbuka dalam pasal ini dimaksudkan untuk memberikan fleksibilitas praktik, namun tetap dalam batas kepastian menurut ketentuan perundang-undangan.</p>
                                    </div>
                                    
                                    <div class="regulation-info">
                                        <h4><i class="fas fa-bullseye"></i> Kepentingan Nasional</h4>
                                        <p>Pasal ini mengatur tentang batas-batas berlakunya aturan pidana dalam perundang-undangan, termasuk ketentuan mengenai penerapan hukum pidana Indonesia terhadap tindak pidana yang dilakukan di luar wilayah Indonesia tetapi berdampak pada kepentingan nasional.</p>
                                    </div>
                                    
                                    <div class="regulation-info">
                                        <h4><i class="fas fa-shield"></i> Perlindungan Hukum Nasional</h4>
                                        <p>Penentuan Tindak Pidana yang menyatakan kepentingan nasional hanya terbatas pada perbuatan tertentu yang sungguh-sungguh melanggar kepentingan hukum nasional yang dilindungi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="no-results" id="noResults">
                    <i class="fas fa-search"></i>
                    <h3>Pasal tidak ditemukan</h3>
                    <p>Tidak ada pasal yang sesuai dengan pencarian Anda. Coba gunakan kata kunci lain.</p>
                </div>
            </div>
            
            <div class="footer-pasal">
                <p>Dokumen hukum ini disajikan untuk tujuan informasi dan referensi.</p>
                <p>© 2023 Daftar Isi Pasal Hukum Indonesia</p>
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