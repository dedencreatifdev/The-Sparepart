<?php

namespace App\Filament\Resources\Produks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                            ->defaultImageUrl(function ($record) {
                                return url('https://partsouq.com/assets/tesseract/assets/partsimages/Mitsubishi/'.$record->kode_produk.'.jpg');
                            })
                            ->size("100%")
                            // ->limitedRemainingText(size: TextSize::Large)
                            ->label('')
                            ->columnSpanFull(),
                ]),
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
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->contentGrid([
                'default' => 2,
                'sm' => 3,
                'md' => 4,
                'lg' => 5,
                'xl' => 6,
                '2xl' => 7,

            ])
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
