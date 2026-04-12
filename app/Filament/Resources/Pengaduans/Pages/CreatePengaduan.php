<?php

namespace App\Filament\Resources\Pengaduans\Pages;

use App\Filament\Resources\Pengaduans\PengaduanResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengaduan;

class CreatePengaduan extends CreateRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = auth()->id();
        $data['status'] = 'menunggu';

        return Pengaduan::create($data);
    }
}
