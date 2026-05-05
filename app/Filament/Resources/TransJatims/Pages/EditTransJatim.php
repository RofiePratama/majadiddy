<?php

namespace App\Filament\Resources\TransJatims\Pages;

use App\Filament\Resources\TransJatims\TransJatimResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransJatim extends EditRecord
{
    protected static string $resource = TransJatimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
