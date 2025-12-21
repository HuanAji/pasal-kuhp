<?php

namespace App\Filament\Resources\PasalCategoryResource\Pages;

use App\Filament\Resources\PasalCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasalCategories extends ListRecords
{
    protected static string $resource = PasalCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}