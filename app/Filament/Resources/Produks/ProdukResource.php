<?php

namespace App\Filament\Resources\Produks;

use App\Filament\Resources\Produks\Pages\ManageProduks;
use App\Models\Produk;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Squares2x2;
    protected static string|UnitEnum|null $navigationGroup = 'Produk';
    protected static ?string $navigationLabel = 'Produk List';

    protected static ?string $recordTitleAttribute = 'nama_produk';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_produk')
                    ->required(),
                TextInput::make('nama_produk')
                    ->required(),
                TextInput::make('satuan')
                    ->required(),
                TextInput::make('kategori')
                    ->required(),
                TextInput::make('brand')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kode_produk'),
                TextEntry::make('nama_produk'),
                TextEntry::make('satuan'),
                TextEntry::make('kategori'),
                TextEntry::make('brand'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('harga')
                    ->numeric(),
                TextEntry::make('stok')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_produk')
            ->columns([
                TextColumn::make('kode_produk')
                    ->searchable(),
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('satuan')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('harga')
                    ->numeric(),
                TextColumn::make('stok')
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

   

    public static function getPages(): array
    {
        return [
            'index' => ManageProduks::route('/'),
        ];
    }
}
