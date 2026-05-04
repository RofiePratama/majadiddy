<?php

namespace App\Filament\Resources\OpenDataDatasets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OpenDataDatasetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('category')->searchable(),
                TextColumn::make('source_agency')->searchable(),
                TextColumn::make('dataset_url'),
                TextColumn::make('published_at')->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
