<?php

namespace App\Filament\Resources\PasalCategoryResource\Pages;

use App\Filament\Resources\PasalCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPasalCategory extends EditRecord
{
    protected static string $resource = PasalCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}