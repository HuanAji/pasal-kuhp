<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasal KUHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .pasal-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .pasal-content.active {
            max-height: 2000px;
            transition: max-height 0.5s ease-in;
        }
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pasal KUHP</h1>
            <p class="text-gray-600">Kitab Undang-Undang Hukum Pidana</p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <form method="GET" action="{{ route('pasal.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pasal</label>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Cari nomor atau isi pasal..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select 
                            name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        >
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }} ({{ $category->pasals_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select 
                            name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        >
                            <option value="">Semua Status</option>
                            <option value="berlaku" {{ request('status') == 'berlaku' ? 'selected' : '' }}>Berlaku</option>
                            <option value="kadaluwarsa" {{ request('status') == 'kadaluwarsa' ? 'selected' : '' }}>Kadaluwarsa</option>
                            <option value="berubah" {{ request('status') == 'berubah' ? 'selected' : '' }}>Berubah</option>
                            <option value="uji_coba" {{ request('status') == 'uji_coba' ? 'selected' : '' }}>Uji Coba</option>
                        </select>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button 
                        type="submit"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                    >
                        Terapkan Filter
                    </button>
                    <a 
                        href="{{ route('pasal.index') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
                    >
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Pasal List -->
        <div class="space-y-3">
            @forelse($pasals as $pasal)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Pasal Header -->
                    <button 
                        onclick="togglePasal({{ $pasal->id }})"
                        class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition"
                    >
                        <div class="flex items-center gap-3">
                            <!-- Status Indicator -->
                            <span 
                                class="status-dot" 
                                style="background-color: {{ $pasal->status_pasal->getHexColor() }}"
                            ></span>
                            
                            <!-- Nomor Pasal -->
                            <span class="font-bold text-lg text-gray-900">{{ $pasal->nomor_pasal }}</span>
                            
                            <!-- Status Badge -->
                            <span 
                                class="px-3 py-1 rounded-full text-xs font-medium"
                                style="background-color: {{ $pasal->status_pasal->getHexColor() }}20; color: {{ $pasal->status_pasal->getHexColor() }}"
                            >
                                {{ $pasal->status_pasal->getLabel() }}
                            </span>
                        </div>

                        <!-- Arrow Icon -->
                        <svg 
                            id="arrow-{{ $pasal->id }}" 
                            class="w-5 h-5 text-gray-500 transition-transform duration-300"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Pasal Content -->
                    <div id="content-{{ $pasal->id }}" class="pasal-content">
                        <div class="px-6 pb-6 border-t border-gray-200">
                            <div class="mt-4">
                                <!-- Category & Date Info -->
                                <div class="flex gap-4 mb-4 text-sm text-gray-600">
                                    <span>📂 {{ $pasal->category->title }}</span>
                                    <span>📅 Berlaku: {{ $pasal->tanggal_berlaku->format('d M Y') }}</span>
                                </div>

                                <!-- Isi Pasal -->
                                <div class="prose max-w-none">
                                    {!! $pasal->isi_pasal !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pasal</h3>
                    <p class="mt-1 text-sm text-gray-500">Belum ada pasal yang ditambahkan atau tidak ada hasil yang sesuai dengan filter.</p>
                </div>
            @endforelse
        </div>

        <!-- Total Count -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Menampilkan {{ $pasals->count() }} pasal
        </div>
    </div>

    <script>
        function togglePasal(id) {
            const content = document.getElementById(`content-${id}`);
            const arrow = document.getElementById(`arrow-${id}`);
            
            content.classList.toggle('active');
            arrow.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>