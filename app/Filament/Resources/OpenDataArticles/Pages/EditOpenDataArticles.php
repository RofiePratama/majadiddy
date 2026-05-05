<?php

namespace App\Filament\Resources\OpenDataArticles\Pages;

use App\Filament\Resources\OpenDataArticles\OpenDataArticlesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOpenDataArticles extends EditRecord
{
    protected static string $resource = OpenDataArticlesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
