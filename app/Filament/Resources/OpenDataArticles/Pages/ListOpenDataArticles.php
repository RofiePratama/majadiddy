<?php

namespace App\Filament\Resources\OpenDataArticles\Pages;

use App\Filament\Resources\OpenDataArticles\OpenDataArticlesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOpenDataArticles extends ListRecords
{
    protected static string $resource = OpenDataArticlesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
