<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Törlés')
                ->modalHeading('Esemény törlése')
                ->modalDescription('Biztos, hogy törölni szeretnéd az eseményt?')
                ->modalCancelActionLabel('Mégsem')
                ->modalSubmitActionLabel('Törlés megerősítése')
        ];
    }

    public function getTitle(): string
    {
        return 'Esemény szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
