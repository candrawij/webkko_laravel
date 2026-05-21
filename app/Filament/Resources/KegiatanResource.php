<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Jumlah Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kegiatan')->required(),
                DatePicker::make('tanggal')->required(),
                TimePicker::make('waktu')->required(),
                TextInput::make('lokasi')->required(),
                Textarea::make('deskripsi')->columnSpanFull(),
                
                // Otomatis handle upload ke folder public/storage/kegiatan
                FileUpload::make('foto')
                    ->directory('kegiatan')
                    ->disk('public')
                    ->image() 
                    ->nullable(),

                TextInput::make('materi'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kegiatan')->searchable()->sortable(),
                TextColumn::make('tanggal')->date('d M Y')->sortable(),
                TextColumn::make('lokasi')->searchable()->sortable(),
                TextColumn::make('deskripsi')->searchable()->limit(50),

                ImageColumn::make('foto')
                    ->state(function ($record) {
                        if (!$record->foto) {
                            return null;
                        }

                        // 1. Pecah string database berdasarkan tanda koma
                        $semua_foto = explode(',', $record->foto);
                        
                        // 2. Ambil foto yang paling pertama [0] dan bersihkan jalurnya
                        $foto_pertama = basename(trim($semua_foto[0]));
                        
                        // 3. Masukkan ke rute jembatan
                        return route('kegiatan.foto', ['nama_file' => $foto_pertama]);
                    })
                    ->disk(null)
                    ->square(),

                TextColumn::make('materi')->searchable()->limit(50), // Menampilkan sebagian materi di tabel
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
