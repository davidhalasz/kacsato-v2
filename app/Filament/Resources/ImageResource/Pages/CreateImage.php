<?php

namespace App\Filament\Resources\ImageResource\Pages;

use App\Filament\Resources\ImageResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Image;

class CreateImage extends CreateRecord
{
    protected static string $resource = ImageResource::class;

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
            Image::create([
                'album_id' => $state['album_id'],
                'filepath' => $image,
            ]);
        }
        return redirect('/admin/images');
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
