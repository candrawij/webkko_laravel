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

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static ?string $label = 'Event';
    protected static ?string $navigationLabel = 'Event';

    protected static ?string $navigationGroup = 'Buku Tamu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_event')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_event'),
                Forms\Components\TextInput::make('lokasi')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama_event')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_event')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('qr_code')
                    ->label('QR')
                    ->getStateUsing(function ($record) {
                        return route('generate.qr') . '?data=' . urlencode(url('/buku_tamu.php?token=' . $record->token));
                    })
                    ->size(100)
                    ->extraImgAttributes(['class' => 'rounded shadow-sm p-1 bg-white']),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('buka_link')
                    ->label('Buka Link')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => url('/buku_tamu.php?token=' . $record->token))
                    ->openUrlInNewTab()
                    ->color('primary'),
                Tables\Actions\Action::make('download_qr')
                    ->label('Download QR')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function ($record) {
                        $url = route('generate.qr') . '?data=' . urlencode(url('/buku_tamu.php?token=' . $record->token));
                        $image = file_get_contents($url);
                        return response()->streamDownload(function () use ($image) {
                            echo $image;
                        }, 'qr_kegiatan_' . $record->id . '.png');
                    }),
                Tables\Actions\Action::make('salin_link')
                    ->label('Copy Link')
                    ->icon('heroicon-o-clipboard-document')
                    ->color('warning')
                    ->extraAttributes(fn ($record) => [
                        'x-on:click' => "window.navigator.clipboard.writeText('".url('/buku_tamu.php?token=' . $record->token)."'); \$tooltip('Tersalin!', { timeout: 1500 });",
                    ]),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
