<?php

namespace App\Filament\Resources\PasalCategoryResource\Pages;

use App\Filament\Resources\PasalCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePasalCategory extends CreateRecord
{
    protected static string $resource = PasalCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}