<?php

namespace App\Filament\Resources\Pengaduans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class PengaduanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                ->relationship('kategori', 'ket_kategori')
                ->required()
                ->label('Kategori'),

                Textarea::make('deskripsi')
                    ->required()
                    ->label('Deskripsi Pengaduan')
                    ->columnSpanFull(),
    
                Select::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                    ])
                    ->visible(fn () => auth()->user()?->role === 'admin'),
    
                Textarea::make('feedback')
                    ->visible(fn ($record) => 
                        auth()->user()?->role === 'admin' 
                        || ($record && filled($record->feedback))
                    )
                    ->disabled(fn () => auth()->user()?->role === 'siswa'),
            ]);
    }
}
