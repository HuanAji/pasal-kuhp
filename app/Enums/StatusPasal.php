<?php

namespace App\Enums;

enum StatusPasal: string
{
    case BERLAKU = 'berlaku';
    case KADALUWARSA = 'kadaluwarsa';
    case BERUBAH = 'berubah';
    case UJI_COBA = 'uji_coba';

    public function getLabel(): string
    {
        return match($this) {
            self::BERLAKU => 'Berlaku',
            self::KADALUWARSA => 'Kadaluwarsa',
            self::BERUBAH => 'Berubah',
            self::UJI_COBA => 'Uji Coba',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            self::BERLAKU => 'success',      // green
            self::KADALUWARSA => 'danger',   // red
            self::BERUBAH => 'warning',      // yellow/orange
            self::UJI_COBA => 'info',        // blue
        };
    }

    public function getHexColor(): string
    {
        return match($this) {
            self::BERLAKU => '#10b981',      // green
            self::KADALUWARSA => '#ef4444',  // red
            self::BERUBAH => '#f59e0b',      // orange
            self::UJI_COBA => '#3b82f6',     // blue
        };
    }
}