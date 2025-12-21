<?php

namespace App\Filament\Resources\PasalResource\Pages;

use App\Filament\Resources\PasalResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePasal extends CreateRecord
{
    protected static string $resource = PasalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}