<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Pasal;
use App\Models\Author;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', News::count())
                ->description('Jumlah berita saat ini')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),
            Stat::make('Total Pasal', Pasal::count())
                ->description('Jumlah pasal saat ini')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success'),
            Stat::make('Total Author', Author::count())
                ->description('Jumlah author terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}
