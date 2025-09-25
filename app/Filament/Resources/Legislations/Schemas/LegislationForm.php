<?php

namespace App\Filament\Resources\Legislations\Schemas;

use App\Enums\LegislationStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LegislationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('code_number'),
                TextInput::make('number')
                    ->numeric(),
                TextInput::make('year')
                    ->numeric(),
                TextInput::make('call_number'),
                TextInput::make('edition'),
                TextInput::make('place'),
                TextInput::make('location'),
                DatePicker::make('approved'),
                DatePicker::make('published'),
                TextInput::make('publisher'),
                Textarea::make('source')
                    ->columnSpanFull(),
                Textarea::make('subject')
                    ->columnSpanFull(),
                Select::make('institute_id')
                    ->relationship('institute', 'name'),
                Select::make('field_id')
                    ->relationship('field', 'name'),
                Select::make('status')
                    ->options(LegislationStatus::class),
                TextInput::make('language'),
                TextInput::make('author'),
                TextInput::make('signer'),
                Textarea::make('note')
                    ->columnSpanFull(),
                Textarea::make('desc')
                    ->columnSpanFull(),
                TextInput::make('isbn'),
                TextInput::make('index_number'),
                TextInput::make('justice'),
                TextInput::make('view')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                DateTimePicker::make('published_at'),
            ]);
    }
}
