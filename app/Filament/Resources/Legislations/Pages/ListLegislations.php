<?php

namespace App\Filament\Resources\Legislations\Pages;

use App\Filament\Resources\Legislations\LegislationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegislations extends ListRecords
{
    protected static string $resource = LegislationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
