<?php

namespace App\Filament\Resources\OpenDataDatasets\Pages;

use App\Filament\Resources\OpenDataDatasets\OpenDataDatasetsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOpenDataDatasets extends EditRecord
{
    protected static string $resource = OpenDataDatasetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
