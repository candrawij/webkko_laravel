<?php

namespace App\Filament\Resources\DaftarEventResource\Pages;

use App\Filament\Resources\DaftarEventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDaftarEvent extends CreateRecord
{
    protected static string $resource = DaftarEventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['token'])) {
            $data['token'] = bin2hex(random_bytes(16));
        }
        return $data;
    }
}
