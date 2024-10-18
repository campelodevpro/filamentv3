<?php

namespace App\Filament\Resources\LivroModelResource\Pages;

use App\Filament\Resources\LivroModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivroModel extends EditRecord
{
    protected static string $resource = LivroModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
