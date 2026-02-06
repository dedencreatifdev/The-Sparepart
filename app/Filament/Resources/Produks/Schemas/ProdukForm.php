<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
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
}
