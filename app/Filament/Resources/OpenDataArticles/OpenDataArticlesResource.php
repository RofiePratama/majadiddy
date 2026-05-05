<?php

namespace App\Filament\Resources\OpenDataArticles;

use App\Filament\Resources\OpenDataArticles\Pages\CreateOpenDataArticles;
use App\Filament\Resources\OpenDataArticles\Pages\EditOpenDataArticles;
use App\Filament\Resources\OpenDataArticles\Pages\ListOpenDataArticles;
use App\Filament\Resources\OpenDataArticles\Schemas\OpenDataArticlesForm;
use App\Filament\Resources\OpenDataArticles\Tables\OpenDataArticlesTable;
use App\Models\OpenDataArticle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OpenDataArticlesResource extends Resource
{
    protected static ?string $model = OpenDataArticle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return OpenDataArticlesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OpenDataArticlesTable::configure($table);
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
            'index' => ListOpenDataArticles::route('/'),
            'create' => CreateOpenDataArticles::route('/create'),
            'edit' => EditOpenDataArticles::route('/{record}/edit'),
        ];
    }
}
