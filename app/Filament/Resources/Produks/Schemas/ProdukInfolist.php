<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\View;
use Filament\Support\Enums\FontWeight;
use Filament\Schemas\Components\Callout;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class ProdukInfolist
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->description('Detailed information about the selected produk.')
                    ->icon(Heroicon::ArchiveBox)
                    ->schema([
                        TextEntry::make('nama_produk')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpan(3)
                            ->label('Nama Produk'),
                        TextEntry::make('kode_produk')
                            ->badge()
                            ->Color('success')
                            ->label('Kode Produk'),
                        
                        // Callout::make('New version available')
                        //     ->description('Filament v4 has been released with exciting new features and improvements.')
                        //     ->info(),
                        TextEntry::make('deskripsi')
                            ->columnSpan(3)
                            ->label('Deskripsi'),
                        ImageEntry::make('image')
                            ->defaultImageUrl(function ($record) {
                                return url('https://partsouq.com/assets/tesseract/assets/partsimages/Mitsubishi/' . $record->kode_produk . '.jpg');
                            })
                            ->extraAttributes([
                                'style' => 'border: 1px solid #ccc; padding: 4px; border-radius: 4px;',
                                'alt' => 'Logo',
                                'loading' => 'lazy',
                            ])
                            ->size("100%")
                            ->label('Images'),
                    ])
                    ->columns(4)
                    ->columnSpan(2),
                Section::make()
                    ->description('Detailed information about the selected produk.')
                    ->icon(Heroicon::ArchiveBox)
                    ->schema([
                        TextEntry::make('satuan')
                            ->label('Satuan'),
                        TextEntry::make('kategori')
                            ->label('Kategori'),
                        TextEntry::make('brand')
                            ->label('Brand'),
                        TextEntry::make('stok')
                            ->label('Stok'),
                        TextEntry::make('harga')
                            ->prefix('Rp ')
                            ->numeric()
                            ->label('Harga'),
                    ])
                    ->inlineLabel()
                    ->columns(1),
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Riwayat')
                            ->icon(Heroicon::Bell)
                            ->schema([
                                // TextEntry::make('deskripsi')
                                //     // ->columnSpan(3)
                                //     ->label('Deskripsi'),
                                View::make('produk')
                                    ->viewData(function ($record) {
                                        return [
                                            'record' => $record,
                                        ];
                                    }),
                            ]),
                        Tab::make('Tab 2')
                            ->icon(Heroicon::User)
                            ->schema([
                                // ...
                            ]),
                        Tab::make('Tab 3')
                            ->icon(Heroicon::DocumentText)
                            ->schema([
                                // ...
                            ]),
                    ])

            ])
            ->columns(3);
    }
}
