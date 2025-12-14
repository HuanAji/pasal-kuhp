<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Banner;

echo "=== Checking Banners Data ===\n";
$banners = Banner::all();
echo "Total banners: " . $banners->count() . "\n\n";

foreach ($banners as $index => $banner) {
    echo "Banner #" . ($index + 1) . ":\n";
    echo "  ID: " . $banner->id . "\n";
    echo "  News ID: " . ($banner->news_id ?? 'NULL') . "\n";
    echo "  Has news relation: " . ($banner->news ? 'YES' : 'NO') . "\n";
    
    if ($banner->news) {
        echo "  News Title: " . $banner->news->title . "\n";
        echo "  News Slug: " . $banner->news->slug . "\n";
        echo "  News Thumbnail: " . $banner->news->thumbnail . "\n";
    }
    echo "\n";
}

// Also check banners with eager load
echo "=== Banners with Eager Load (as in Controller) ===\n";
$bannersEager = Banner::with(['news.author', 'news.newsCategory'])->get();
echo "Total banners with eager load: " . $bannersEager->count() . "\n";
foreach ($bannersEager as $index => $banner) {
    echo "Banner #" . ($index + 1) . ": " . ($banner->news ? $banner->news->title : 'NO NEWS') . "\n";
}
