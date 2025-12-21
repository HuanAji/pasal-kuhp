<?php

namespace App\Filament\Resources\PasalResource\Pages;

use App\Filament\Resources\PasalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPasal extends ViewRecord
{
    protected static string $resource = PasalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}