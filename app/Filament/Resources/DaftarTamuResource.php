<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarTamuResource\Pages;
use App\Models\BukuTamu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class DaftarTamuResource extends Resource
{
    protected static ?string $model = BukuTamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static ?string $label = 'Daftar Tamu';

    protected static ?string $navigationGroup = 'Buku Tamu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'nama_event')
                    ->label('Kegiatan')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kecamatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('checkin_at')
                    ->label('Waktu Check In'),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('buku_tamu'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('event.nama_event')
                    ->label('Kegiatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instansi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public') // Adjust disk based on actual asset location
                    ->getStateUsing(fn ($record) => $record->foto ? asset('assets/buku_tamu/' . $record->foto) : null),
                Tables\Columns\TextColumn::make('checkin_at')
                    ->label('Waktu')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('event_id')
                    ->label('Filter by Kegiatan')
                    ->relationship('event', 'nama_event'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('export_excel')
                    ->label('Excel')
                    ->color('success')
                    ->icon('heroicon-o-document-text')
                    ->url(fn () => url('/export_buku_tamu.php') . (request()->has('tableFilters.event_id.value') ? '?event_id=' . request('tableFilters.event_id.value') : '')),
                Tables\Actions\Action::make('export_pdf')
                    ->label('PDF')
                    ->color('danger')
                    ->icon('heroicon-o-document-chart-bar')
                    ->url(fn () => url('/export_pdf_buku_tamu.php') . (request()->has('tableFilters.event_id.value') ? '?event_id=' . request('tableFilters.event_id.value') : '')),
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
            'index' => Pages\ListDaftarTamus::route('/'),
            'create' => Pages\CreateDaftarTamu::route('/create'),
            'edit' => Pages\EditDaftarTamu::route('/{record}/edit'),
        ];
    }
}
