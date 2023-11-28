<?php

namespace App\Filament\Resources\ImageResource\Pages;

use App\Filament\Resources\ImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImages extends ListRecords
{
    protected static string $resource = ImageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Új hozzáadása'),
        ];
    }

    public function getTitle(): string
    {
        return 'Képek';
    }
}
