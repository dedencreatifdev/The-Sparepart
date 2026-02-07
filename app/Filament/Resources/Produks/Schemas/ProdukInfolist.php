<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class ProdukInfolist
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->components([
                        ImageEntry::make('image')
                            ->defaultImageUrl(function ($record) {
                                return url('https://partsouq.com/assets/tesseract/assets/partsimages/Mitsubishi/' . $record->kode_produk . '.jpg');
                            })
                            ->size("100%")
                            ->label('Images')
                            ->columnSpanFull(),
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
                    ]),
            ]);
    }
}
