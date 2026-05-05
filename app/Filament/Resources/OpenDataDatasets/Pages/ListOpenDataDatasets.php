<?php

namespace App\Filament\Resources\OpenDataDatasets\Pages;

use App\Filament\Resources\OpenDataDatasets\OpenDataDatasetsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOpenDataDatasets extends ListRecords
{
    protected static string $resource = OpenDataDatasetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
