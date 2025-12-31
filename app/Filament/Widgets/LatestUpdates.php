<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Pasal;
use Filament\Widgets\Widget;

class LatestUpdates extends Widget
{
    protected static ?int $sort = 2;
    protected static string $view = 'filament.widgets.latest-updates';
    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $latestNews = News::latest()->take(5)->get()->map(function ($item) {
            return [
                'type' => 'Berita',
                'title' => $item->title,
                'created_at' => $item->created_at,
            ];
        });

        $latestPasal = Pasal::latest()->take(5)->get()->map(function ($item) {
            return [
                'type' => 'Pasal',
                'title' => $item->nomor_pasal,
                'created_at' => $item->created_at,
            ];
        });

        // Combine, sort by date descending (newest first), and take top 5-10
        $updates = $latestNews->concat($latestPasal)->sortByDesc('created_at')->take(6);

        return [
            'updates' => $updates,
        ];
    }
}
