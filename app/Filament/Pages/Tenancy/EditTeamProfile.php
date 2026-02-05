<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Company Profile';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Information')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('alamat')
                            ->nullable(),
                        TextInput::make('telepon')
                            ->nullable(),
                        TextInput::make('email')
                            ->nullable(),
                        FileUpload::make('logo')
                            ->nullable(),
                        // ...
                    ]),
            ]);
    }
}
