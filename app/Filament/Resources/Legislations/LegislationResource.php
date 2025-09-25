<?php

namespace App\Filament\Resources\Legislations;

use App\Filament\Resources\Legislations\Pages\CreateLegislation;
use App\Filament\Resources\Legislations\Pages\EditLegislation;
use App\Filament\Resources\Legislations\Pages\ListLegislations;
use App\Filament\Resources\Legislations\Schemas\LegislationForm;
use App\Filament\Resources\Legislations\Tables\LegislationsTable;
use App\Models\Legislation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LegislationResource extends Resource
{
    protected static ?string $model = Legislation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LegislationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegislationsTable::configure($table);
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
            'index' => ListLegislations::route('/'),
            'create' => CreateLegislation::route('/create'),
            'edit' => EditLegislation::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
