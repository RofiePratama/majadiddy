<?php

namespace App\Filament\Resources\OpenDataArticles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OpenDataArticlesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('title')->required(),
                TextInput::make('content')->required(),
                TextInput::make('author')->required(),
                TextInput::make('article_url')->required(),
                TextInput::make('published_at')->required()
            ]);
    }
}
