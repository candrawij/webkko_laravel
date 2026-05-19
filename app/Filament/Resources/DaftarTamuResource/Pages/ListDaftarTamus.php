<?php

namespace App\Filament\Resources\DaftarTamuResource\Pages;

use App\Filament\Resources\DaftarTamuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarTamus extends ListRecords
{
    protected static string $resource = DaftarTamuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
