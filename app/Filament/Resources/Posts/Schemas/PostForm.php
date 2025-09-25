<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('taxonomy_id')
                    ->relationship('taxonomy', 'name'),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('source')
                    ->columnSpanFull(),
                TextInput::make('cover_id')
                    ->numeric(),
                TextInput::make('view')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('author_id')
                    ->relationship('author', 'name'),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                DateTimePicker::make('published_at'),
            ]);
    }
}
