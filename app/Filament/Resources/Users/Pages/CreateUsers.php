<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UsersResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateUsers extends CreateRecord
{
    protected static string $resource = UsersResource::class;

    protected function handleRecordCreation(array $data): User
    {
        $data['role'] = 'siswa';
        return User::create($data);
    }
}
