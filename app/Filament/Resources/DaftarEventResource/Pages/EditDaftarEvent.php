<?php

namespace App\Filament\Resources\DaftarEventResource\Pages;

use App\Filament\Resources\DaftarEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarEvent extends EditRecord
{
    protected static string $resource = DaftarEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
