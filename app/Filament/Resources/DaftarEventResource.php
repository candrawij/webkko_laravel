<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarEventResource\Pages;
use App\Filament\Resources\DaftarEventResource\RelationManagers;
use App\Models\DaftarEvent;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarEventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static ?string $label = 'Daftar Event';

    protected static ?string $navigationGroup = 'Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_event')->label('Nama Event')->required(),
                TextInput::make('deskripsi')->label('Deskripsi')->required(),
                DatePicker::make('tanggal_event')->label('Tanggal Event')->required(),
                TextInput::make('lokasi')->label('Lokasi')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_event')->label('Nama Event')->searchable(),
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                TextColumn::make('tanggal_event')->label('Tanggal Event')->date(),
                TextColumn::make('lokasi')->label('Lokasi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarEvents::route('/'),
            'create' => Pages\CreateDaftarEvent::route('/create'),
            'edit' => Pages\EditDaftarEvent::route('/{record}/edit'),
        ];
    }
}
