<!-- NAVBAR -->
<div class="sticky top-0 z-50 py-5 px-4 lg:px-14 bg-white shadow-sm">
  <div class="flex items-center justify-between w-full">

    <!-- LOGO (Kiri) -->
    <div class="flex items-center gap-2">
      <a href="{{ route('landing') }}" class="flex items-center gap-2">
        <img src="{{ asset('assets/img/Logo.png') }}" class="w-8 lg:w-10">
        <p class="text-lg lg:text-xl font-bold">
          <span class="text-black">Pasal</span>
          <span class="text-primary">KUHP</span>
        </p>
      </a>
    </div>

    <!-- MENU DESKTOP (Tengah) -->
    <div class="hidden lg:flex flex-1 justify-center">
      <ul class="flex gap-10 font-medium text-base">
        <li>
          <a href="{{ route('landing') }}"
             class="{{ request()->is('/') ? 'text-primary' : '' }} hover:text-primary">
            Beranda
          </a>
        </li>

        @foreach (\App\Models\NewsCategory::all() as $category)
          <li>
            <a href="{{ route('news.category', $category->slug) }}"
               class="{{ request()->is('news/category/' . $category->slug) ? 'text-primary' : '' }} hover:text-primary">
              {{ $category->title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <!-- SEARCH + LOGIN + HAMBURGER (Kanan) -->
    <div class="flex items-center gap-3">
      
      <!-- SEARCH & LOGIN (Desktop only) -->
      <div class="hidden lg:flex items-center gap-3">
        <div class="relative">
          <form action="{{ route('news.index') }}" method="GET">
            <input
              type="text"
              name="search"
              value="{{ request('search') }}"
              placeholder="Cari berita..."
              class="border border-slate-300 rounded-full px-4 py-2 pl-8 text-sm focus:outline-none focus:ring-primary focus:border-primary"
            />
          </form>
          <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
            <img src="{{ asset('assets/img/search.png') }}" class="w-4">
          </span>
        </div>

        <a href="/admin" class="bg-primary px-8 py-2 rounded-full text-white font-semibold">
          Masuk
        </a>
      </div>

      <!-- HAMBURGER: Muncul di kanan -->
      <button id="menu-toggle" class="lg:hidden text-primary text-3xl">
        ☰
      </button>
    </div>
  </div>

  <!-- MENU MOBILE DROPDOWN -->
  <div id="menu-mobile" class="hidden flex-col mt-4 gap-4 lg:hidden">
    <ul class="flex flex-col gap-4 font-medium text-base">
      <li>
        <a href="{{ route('landing') }}"
           class="{{ request()->is('/') ? 'text-primary' : '' }} hover:text-primary">
          Beranda
        </a>
      </li>

      @foreach (\App\Models\NewsCategory::all() as $category)
        <li>
          <a href="{{ route('news.category', $category->slug) }}"
             class="{{ request()->is('news/category/' . $category->slug) ? 'text-primary' : '' }} hover:text-primary">
            {{ $category->title }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<!-- SCRIPT: Toggle Menu Mobile -->
<script>
  const toggle = document.getElementById("menu-toggle");
  const menuMobile = document.getElementById("menu-mobile");

  toggle.addEventListener("click", () => {
    menuMobile.classList.toggle("hidden");
  });
</script>
