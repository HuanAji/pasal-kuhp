@extends('layouts.app')

@section('title', 'Detail Pasal ' . $pasal->nomor_pasal)

@section('content')
<div class="min-h-screen pt-24 lg:pt-28 pb-12" style="background: linear-gradient(180deg, #f8f8f8 0%, #ffffff 100%);">
    <div class="px-4 lg:px-14">
        <!-- Breadcrumb -->
        <div class="mb-6 flex items-center text-sm text-slate-500 gap-2">
            <a href="{{ route('landing') }}" class="hover:text-primary">Beranda</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <a href="{{ route('pasal.index') }}" class="hover:text-primary">Pasal</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-primary font-medium">Pasal {{ $pasal->nomor_pasal }}</span>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8">
                <div class="bg-primary p-6 text-white">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold">Pasal {{ $pasal->nomor_pasal }}</h1>
                            <p class="text-white/80 mt-1">{{ $pasal->category->title }}</p>
                        </div>
                        <div class="badge-status bg-white/20 backdrop-blur-sm border border-white/30 px-4 py-2 rounded-full flex items-center gap-2">
                            <span class="status-dot w-2 h-2 rounded-full" style="background-color: white"></span>
                            <span class="font-medium text-sm">{{ $pasal->status_pasal->getLabel() }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    <!-- Metadata info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 pb-8 border-bottom border-slate-100 border-b">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-primary">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Tanggal Berlaku</p>
                                <p class="text-slate-800 font-medium">{{ $pasal->tanggal_berlaku->format('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                                <i class="fas fa-book text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Kategori Hukum</p>
                                <p class="text-slate-800 font-medium">{{ $pasal->category->title }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="pasal-detail-content">
                        <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-align-left text-primary text-sm"></i>
                            Isi Pasal
                        </h3>
                        <div class="prose max-w-none text-slate-700 leading-relaxed text-lg">
                            {!! $pasal->isi_pasal !!}
                        </div>
                    </div>
                </div>
                
                <!-- Footer Info -->
                <div class="bg-slate-50 p-6 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-slate-500 italic">Disajikan untuk tujuan informasi dan referensi hukum.</p>
                    <div class="flex gap-3">
                        <button onclick="window.print()" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 rounded-lg text-sm font-medium hover:bg-slate-50 transition">
                            <i class="fas fa-print"></i> Cetak Pasal
                        </button>
                        <a href="https://wa.me/?text={{ urlencode('Cek Pasal ' . $pasal->nomor_pasal . ' di PasalKUHP: ' . url()->current()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-[#25D366] text-white rounded-lg text-sm font-medium hover:opacity-90 transition">
                            <i class="fab fa-whatsapp"></i> Bagikan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex justify-between items-center">
                <a href="{{ route('pasal.index') }}" class="flex items-center gap-2 mb-8 text-primary font-semibold hover:gap-3 transition-all">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pasal
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .pasal-detail-content p {
        margin-bottom: 1.5rem;
    }
    .pasal-detail-content strong {
        color: #8b0000;
        display: block;
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
    }
</style>
@endsection
