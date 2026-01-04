@extends('layouts.app')

@section('title', 'Pasal KUHP')

@push('head')
<link rel="stylesheet" href="{{ asset('css/pasal-modern.css') }}">
@endpush

@section('content')

<section id="pasal" class="pasal-section-container">
    <div class="bg-gray-50 min-h-screen pt-24 lg:pt-32 pb-12">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Pasal KUHP</h1>
            <p class="text-gray-600">Kitab Undang-Undang Hukum Pidana</p>
        </div>

        <!-- FILTER -->
        <div class="bg-white filter-card p-6 mb-10">
            <form method="GET" action="{{ route('pasal.index') }}" class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Cari Pasal
                        </label>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nomor atau isi pasal..."
                            class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-red-500"
                        >
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Kategori
                        </label>
                        <select
                            name="category"
                            class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-red-500"
                        >
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Status
                        </label>
                        <select
                            name="status"
                            class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-red-500"
                        >
                            <option value="">Semua Status</option>
                            <option value="berlaku">Berlaku</option>
                            <option value="kadaluwarsa">Kadaluwarsa</option>
                            <option value="berubah">Berubah</option>
                            <option value="uji_coba">Uji Coba</option>
                        </select>
                    </div>
                </div>

                <div class="flex gap-3 mt-5">
                    <button class="btn-primary">Terapkan Filter</button>
                    <a href="{{ route('pasal.index') }}" class="btn-secondary">Reset</a>
                </div>
            </form>
        </div>

        <!-- LIST PASAL -->
        <div class="space-y-4">
            @forelse($pasals as $pasal)
                <div class="pasal-card overflow-hidden">

                    <!-- HEADER PASAL -->
                    <div
                        onclick="togglePasalItem({{ $pasal->id }})"
                        class="pasal-header flex justify-between items-center"
                    >
                        <div class="flex items-center gap-6">
                            <span
                                class="status-dot-indicator"
                                style="background: {{ $pasal->status_pasal->getHexColor() }}"
                            ></span>

                            <span class="pasal-title-text uppercase tracking-tight">
                                {{ $pasal->nomor_pasal }}
                            </span>

                            <span
                                class="status-badge"
                                style="background: {{ $pasal->status_pasal->getHexColor() }}20;
                                       color: {{ $pasal->status_pasal->getHexColor() }}"
                            >
                                {{ $pasal->status_pasal->getLabel() }}
                            </span>
                        </div>

                        <svg
                            id="arrow-{{ $pasal->id }}"
                            class="w-5 h-5 text-gray-400 arrow-rotate"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                    <!-- CONTENT -->
                    <div id="content-{{ $pasal->id }}" class="pasal-content-box">
                        <div class="px-10 pb-16 border-t border-gray-100 bg-slate-50/50">
                            <!-- Metadata Information Bar -->
                            <div class="mt-8 flex flex-wrap items-center gap-4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-slate-200/60 shadow-sm">
                                <div class="flex items-center gap-2 px-3 py-1.5 bg-red-50 rounded-xl">
                                    <i class="fas fa-folder-open text-red-500 text-sm"></i>
                                    <span class="text-sm font-bold text-red-600 uppercase tracking-tight">{{ $pasal->category->title }}</span>
                                </div>
                                <div class="flex items-center gap-2 px-3 py-1.5 bg-blue-50 rounded-xl">
                                    <i class="fas fa-clock text-blue-500 text-sm"></i>
                                    <span class="text-sm font-bold text-blue-600 uppercase tracking-tight">Berlaku: {{ $pasal->tanggal_berlaku->format('d M Y') }}</span>
                                </div>
                                <div class="hidden sm:block ml-auto text-xs font-medium text-slate-400">
                                    ID: #{{ str_pad($pasal->id, 4, '0', STR_PAD_LEFT) }}
                                </div>
                            </div>

                            <!-- Legal Text Container -->
                            <div class="mt-8 relative">
                                <div class="absolute -left-4 top-0 bottom-0 w-1.5 bg-red-600 rounded-full opacity-20"></div>
                                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="prose prose-slate prose-lg max-w-none text-slate-800 leading-relaxed font-medium">
                                        {!! $pasal->isi_pasal !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Action Footer -->
                            <div class="mt-12 mb-4 flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-slate-200/60">
                                <p class="text-sm text-slate-400 italic text-center sm:text-left">Klik rincian lengkap untuk melihat penjelasan hukum mendalam, pasal terkait, & opsi cetak dokumen.</p>
                                <a href="{{ route('pasal.show', $pasal->id) }}"
                                   class="btn-primary inline-flex items-center gap-3 !py-4 !px-10 group shadow-lg shadow-red-500/25 whitespace-nowrap">
                                    <span class="font-black">Buka Rincian Lengkap</span>
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white p-10 rounded-xl text-center shadow">
                    <p class="text-gray-500">Tidak ada pasal ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- TOTAL -->
        <div class="mt-8 text-center text-sm text-gray-600">
            Menampilkan {{ $pasals->count() }} pasal
        </div>
    </div>
</div>
</section>

<!-- JS -->
<script>
function togglePasalItem(id) {
    const content = document.getElementById(`content-${id}`);
    const arrow = document.getElementById(`arrow-${id}`);

    content.classList.toggle('active');
    arrow.style.transform = content.classList.contains('active')
        ? 'rotate(180deg)'
        : 'rotate(0deg)';
}
</script>
@endsection
