<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftarResource\Pages;
use App\Filament\Resources\PendaftarResource\RelationManagers;
use App\Models\Pendaftar;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftarResource extends Resource
{
    protected static ?string $model = Pendaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Pendaftar';

    public static ?string $label = 'Pendaftar';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Jumlah Pendaftar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->required(),

                TextInput::make('no_hp')
                    ->label('No. HP / WhatsApp')
                    ->tel() // Mengoptimalkan keyboard angka saat dibuka di HP
                    ->required(),

                TextInput::make('alamat')
                    ->required(),

                TextInput::make('tempat_lahir')
                    ->required(),

                // REVISI: Fungsi ->date() sudah dihapus karena sudah diwakili oleh DatePicker
                DatePicker::make('tanggal_lahir')
                    ->required(),

                // REVISI: Mengubah teks bebas menjadi Dropdown Pilihan Pria/Wanita
                Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                TextInput::make('pendidikan_terakhir')
                    ->required(),

                // REVISI: Mengubah status enum menjadi Dropdown sesuai struktur data barumu
                Select::make('status')
                    ->options([
                        'pending' => 'Pending (Menunggu)',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('no_hp')->searchable()->sortable(),
                TextColumn::make('alamat')->searchable()->sortable()->limit(50),
                TextColumn::make('tempat_lahir')->searchable()->sortable(),
                TextColumn::make('tanggal_lahir')->searchable()->sortable(),
                TextColumn::make('jenis_kelamin')->searchable()->sortable(),
                TextColumn::make('pendidikan_terakhir')->searchable()->sortable(),
                TextColumn::make('status')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->sortable()
                    ->label('Tanggal Daftar')
                    ->dateTime(),
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
            'index' => Pages\ListPendaftars::route('/'),
            'create' => Pages\CreatePendaftar::route('/create'),
            'edit' => Pages\EditPendaftar::route('/{record}/edit'),
        ];
    }
}
