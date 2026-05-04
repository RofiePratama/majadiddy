<?php

namespace App\Filament\Resources\OpenDataDatasets;

use App\Filament\Resources\OpenDataDatasets\Pages\CreateOpenDataDatasets;
use App\Filament\Resources\OpenDataDatasets\Pages\EditOpenDataDatasets;
use App\Filament\Resources\OpenDataDatasets\Pages\ListOpenDataDatasets;
use App\Filament\Resources\OpenDataDatasets\Schemas\OpenDataDatasetsForm;
use App\Filament\Resources\OpenDataDatasets\Tables\OpenDataDatasetsTable;
use App\Models\OpenDataDataset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OpenDataDatasetsResource extends Resource
{
    protected static ?string $model = OpenDataDataset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return OpenDataDatasetsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OpenDataDatasetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOpenDataDatasets::route('/'),
            'create' => CreateOpenDataDatasets::route('/create'),
            'edit' => EditOpenDataDatasets::route('/{record}/edit'),
        ];
    }
}
