<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;

class UsersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),

                TextInput::make('nis')
                    ->required(),

                TextInput::make('kelas')
                    ->required(),

                TextInput::make('password')
                    ->password()
                    ->required(fn ($record) => $record === null)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)),
                Select::make('role')
                    ->options([
                        'siswa' => 'Siswa',
                    ])
                    ->default('siswa')
                    ->disabled()
                    ->dehydrated()
                    ->required(),
            ]);
    }
}
