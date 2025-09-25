<?php

namespace App\Filament\Resources\Legislations\Pages;

use App\Filament\Resources\Legislations\LegislationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditLegislation extends EditRecord
{
    protected static string $resource = LegislationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
