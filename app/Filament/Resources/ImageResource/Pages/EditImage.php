<?php

namespace App\Filament\Resources\ImageResource\Pages;

use App\Filament\Resources\ImageResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditImage extends EditRecord
{
    protected static string $resource = ImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Törlés')
                ->modalHeading('Kép törlése')
                ->modalDescription('Biztos, hogy törölni szeretnéd a képet?')
                ->modalCancelActionLabel('Mégsem')
                ->modalSubmitActionLabel('Törlés megerősítése')
        ];
    }

    protected function getActions(): array
    {
        $image = $this->record;

        return [
            Action::make('Törlés')
                    ->action(function () use ($image) {
                        if(Storage::exists('public/'.$image->filepath)) {
                            Storage::delete('public/'.$image->filepath);
                        }
                        $image->delete();
                        return redirect('/admin/images');
                    })
                    ->color('danger')
                    ->requiresConfirmation(),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()->label('Változtatások mentése'),
            $this->getCancelFormAction()->label('Mégsem')
        ];
    }

    public function getTitle(): string
    {
        return 'Kép szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
