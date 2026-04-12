<?php

namespace App\Filament\Resources\Pengaduans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;

class PengaduansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Siswa')
                    ->searchable(),
    
                TextColumn::make('kategori.ket_kategori')
                    ->label('Kategori')
                    ->searchable(),
    
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'menunggu',
                        'primary' => 'diproses',
                        'success' => 'selesai',
                    ]),
    
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime(),
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make()
                    ->visible(fn () => auth()->user()?->role === 'siswa'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn () => auth()->user()?->role === 'admin')
                    ->label('Tanggapi'),
            ]);
    }
}