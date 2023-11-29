<?php

namespace App\Filament\Resources\AlbumResource\Pages;

use App\Filament\Resources\AlbumResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditAlbum extends EditRecord
{
    protected static string $resource = AlbumResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Törlés')
                ->modalHeading('Album törlése')
                ->modalDescription('Biztos törölni szeretnéd az albumot?')
                ->modalCancelActionLabel('Mégsem')
                ->modalSubmitActionLabel('Törlés megerősítése'),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('editAlbum')->action('editAlbum')->color('primary')->label('Változtatások mentése'),
            $this->getCancelFormAction()->label('Mégsem')
        ];
    }

    public function getTitle(): string
    {
        return 'Album szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
