<?php

namespace App\Filament\Resources\Produks\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\TextSize;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;

class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                        ->extraAttributes([
                            'style' => 'border-bottom: 1px solid #ccc; padding: 4px; border-radius: 1px;',
                            'alt' => 'Logo',
                            'loading' => 'lazy',
                        ])
                        ->defaultImageUrl(function ($record) {
                            return url('https://partsouq.com/assets/tesseract/assets/partsimages/Mitsubishi/' . $record->kode_produk . '.jpg');
                        })
                        ->size("100%")
                        // ->limitedRemainingText(size: TextSize::Large)
                        ->label('')
                        ->columnSpanFull(),
                ]),
                TextColumn::make('kode_produk')
                    
                    ->weight(FontWeight::Bold)
                    ->searchable(),
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('satuan')
                    ->prefix('Satuan: '),
                // TextColumn::make('kategori')
                //     ->searchable(),
                // TextColumn::make('brand')
                //     ->searchable(),
                TextColumn::make('harga')
                    ->weight(FontWeight::Bold)
                    ->prefix('Rp ')
                    ->numeric(),
                // TextColumn::make('stok')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->contentGrid([
                'default' => 2,
                'sm' => 2,
                'md' => 3,
                'lg' => 4,
                'xl' => 6,
                '2xl' => 7,

            ])
            ->paginated([28, 56, 74, 100, 'all'])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ])
        ;
    }
}
