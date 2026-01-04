@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <!-- Detail Berita -->
      <div class="flex flex-col px-4 lg:px-14 pt-24 lg:pt-28">
        <div class="mb-8 text-center lg:text-left">
          <h1 class="font-bold text-2xl lg:text-4xl text-primary mb-4 leading-tight">
            {{ $news->title }}
          </h1>
          <div class="flex flex-col gap-2">
            <div class="text-slate-500 text-sm lg:text-base">
              {{ $news->author->name }} - <span class="text-primary font-semibold">{{ $news->newsCategory->title }}</span>
            </div>
            <div class="text-slate-600 text-xs lg:text-sm">
              {{ $news->created_at->isoFormat('dddd, D MMM Y HH:mm') }} WIB
            </div>
          </div>
        </div>
        <div class="flex flex-col lg:flex-row w-full gap-10">
          <!-- Berita Utama -->
            <div class="lg:w-8/12">
                <img 
                    src="{{ asset('storage/' . $news->thumbnail) }}" 
                    alt="" 
                    class="w-full max-h-96 rounded-xl object-cover"
                >
                @if ($news->thumbnail_caption)
                    <p class="text-sm text-slate-500 mt-2 text-center lg:text-left italic">
                        {{ $news->thumbnail_caption }}
                    </p>
                @endif

                <div class="news-content">
                    {!! $news->content !!}
                </div>
            </div>


          <!-- Berita Terbaru -->
          <div class="lg:w-4/12 flex flex-col gap-10">
            <div class="sticky top-24 z-40">
              <p class="font-bold mb-4 lg:mb-8 text-xl text-primary lg:text-2xl text-center lg:text-left">Berita Terbaru Lainnya</p>
              <!-- Berita Card -->
              <div class="sidebar-news-grid grid grid-cols-1 gap-5">
                @foreach ($newests as $new)
                    <a href="{{ route('news.show', $new->slug) }}" class="sidebar-news-item relative border border-slate-300 hover:border-primary p-3 rounded-xl bg-white transition-all duration-300">
                        <div class="bg-primary text-white rounded-full w-fit px-3 py-1 font-normal text-[10px] absolute top-2 left-2 z-10 shadow-sm">
                            {{ $new->newsCategory->title }}
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3">
                          <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="" 
                            class="w-full h-24 lg:w-28 lg:h-20 rounded-lg object-cover shrink-0">
                          <div class="flex flex-col justify-center">
                            <p class="font-bold text-xs lg:text-base leading-snug line-clamp-2">{{ $new->title }}</p>
                            <p class="text-slate-400 mt-1 text-[10px]">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y') }}</p>
                          </div>
                        </div>
                    </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--- End Detail Berita -->

  <!-- Author Section -->
  <div class="flex flex-col gap-4 mb-10 p-4 lg:p-10 lg:px-14 w-full lg:w-2/3">
    <p class="font-semibold text-xl lg:text-2xl mb-2">Author</p>
    <a href="{{ route('author.show', $news->author->username) }}">
      <div
        class="flex flex-col lg:flex-row gap-4 items-center border border-slate-300 rounded-xl p-6 lg:p-8 hover:border-primary transition">
        <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="profile" class="rounded-full w-24 lg:w-28 border-2 border-primary">
        <div class="text-center lg:text-left">
          <p class="font-bold text-lg lg:text-xl">{{ $news->author->name }}</p>
          <p class="text-sm lg:text-base leading-relaxed">
            {{ Str::limit($news->author->bio, 100) }}
          </p>
        </div>
      </div>
    </a>
  </div>
@endsection