<?php

namespace App\Filament\Resources\DaftarEventResource\Pages;

use App\Filament\Resources\DaftarEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarEvents extends ListRecords
{
    protected static string $resource = DaftarEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
