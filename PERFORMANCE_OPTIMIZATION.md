# Performance Optimization Guide

## Masalah yang Diperbaiki

**LCP (Largest Contentful Paint): 5.53s → Target: < 2.5s**

## Perubahan yang Dilakukan

### 1. **View Optimization** (`resources/views/pages/landing.blade.php`)

-   ✅ Ganti `background-image` dengan `<img>` tag (lebih cepat rendering)
-   ✅ Lazy loading untuk banner slides (kecuali banner pertama)
-   ✅ Lazy loading untuk avatar author
-   ✅ Semantic HTML structure yang lebih optimal

**Alasan**: Background images tidak diprioritaskan oleh browser untuk LCP. Img tag lebih efisien untuk LCP.

### 2. **Layout Preload** (`resources/views/layouts/app.blade.php`)

-   ✅ Preconnect ke CDN (cdn.jsdelivr.net)
-   ✅ Preload critical scripts (swiper.js)
-   ✅ DNS prefetch untuk faster resolution

**Alasan**: Critical resources dimuat lebih cepat sebelum dibutuhkan.

### 3. **Swiper Initialization** (`public/assets/js/swiper.js`)

-   ✅ Defer swiper initialization dengan `DOMContentLoaded` event
-   ✅ Tambah delay 100ms agar images dimuat dulu
-   ✅ Disable preloading images pada swiper config
-   ✅ Lazy load next/prev slides saja

**Alasan**: Mencegah swiper blocking LCP element rendering.

### 4. **Database Query Optimization** (`app/Http/Controllers/LandingController.php`)

-   ✅ Eager load relations dengan `with()`
-   ✅ Filter banner yang `whereNotNull('news_id')`
-   ✅ Limit queries dengan `take()`
-   ✅ Use `withCount()` untuk counting tanpa extra query

**Alasan**: Menghindari N+1 query problem yang memperlambat page load.

## Tips Tambahan untuk Optimasi Lebih Lanjut

### 5. **Image Optimization**

Pastikan semua thumbnail image di folder `storage/` sudah dioptimalkan:

```bash
# Resize dan compress images
# Gunakan tools seperti:
# - ImageOptim (Mac)
# - FileOptimizer (Windows)
# - ImageMagick / ffmpeg
```

**Target size**: Thumbnail max 300KB, Avatar max 50KB

### 6. **WebP Format**

Convert images ke WebP dengan fallback:

```blade
<picture>
  <source srcset="{{ asset('storage/' . $image . '.webp') }}" type="image/webp">
  <img src="{{ asset('storage/' . $image) }}" loading="lazy">
</picture>
```

### 7. **Laravel Caching**

Add to `LandingController`:

```php
$banners = Cache::remember('landing.banners', 3600, function () {
    return Banner::with(['news.author', 'news.newsCategory'])
        ->whereNotNull('news_id')
        ->get();
});
```

### 8. **CSS Optimization**

Check di `resources/css/app.css`:

-   Remove unused CSS dengan PurgeCSS/TailwindCSS tree-shaking
-   Inline critical CSS untuk above-fold content

### 9. **JavaScript Optimization**

-   Defer non-critical scripts
-   Minify dan gzip output
-   Remove unused JavaScript libraries

### 10. **Monitoring**

Test performa dengan:

-   Chrome DevTools Lighthouse
-   PageSpeed Insights
-   WebPageTest.org

## Expected Results

Dengan optimasi ini, diperkirakan:

-   **LCP**: 5.53s → 2-3s (Better)
-   **FID**: Improve latency
-   **CLS**: Prevent layout shifts

Monitor hasil dengan:

```bash
# Di Chrome DevTools
# 1. Performance tab → Run Lighthouse
# 2. Catat LCP, FID, CLS scores
```

## Testing

Setelah deploy, test dengan:

1. Hard refresh (Ctrl+Shift+R atau Cmd+Shift+R)
2. Chrome DevTools > Network (disable cache)
3. Chrome DevTools > Lighthouse
4. Check waterfall untuk identify bottlenecks

---

**Last Updated**: December 14, 2025
