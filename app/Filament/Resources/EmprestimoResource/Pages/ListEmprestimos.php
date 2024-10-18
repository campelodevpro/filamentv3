<?php

namespace App\Filament\Resources\EmprestimoResource\Pages;

use App\Filament\Resources\EmprestimoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmprestimos extends ListRecords
{
    protected static string $resource = EmprestimoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
