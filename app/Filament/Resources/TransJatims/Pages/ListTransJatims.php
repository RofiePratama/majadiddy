<?php

namespace App\Filament\Resources\TransJatims\Pages;

use App\Filament\Resources\TransJatims\TransJatimResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransJatims extends ListRecords
{
    protected static string $resource = TransJatimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
