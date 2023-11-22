<?php

namespace App\Filament\Resources\AlbumResource\Pages;

use App\Filament\Resources\AlbumResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Album;

class CreateAlbum extends CreateRecord
{
    protected static string $resource = AlbumResource::class;

    protected function getFormActions(): array
    {
        return [
            Action::make('createImage')->action('createImage')->color('primary')->label('Hozzáadás'),
            $this->getCancelFormAction()->label('Mégsem')
        ];
    }

    public function createImage() {
        $state = $this->form->getState();
        foreach ($state['filepath'] as $key => $image) {
            Album::create([
                'album_name' => $state['album_name'],
                'filepath' => $image,
            ]);
        }
        return redirect('/admin/albums');
    }

    public function getTitle(): string
    {
        return 'Képek hozzáadása';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
