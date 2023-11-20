<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Models\Event;
use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

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
            Event::create([
                'title' => $state['title'],
                'filepath' => $image,
                'start_date' => $state['start_date'],
                'end_date' => $state['end_date'],
                'is_all_day' => $state['is_all_day'],
            ]);
        }
        return redirect('/admin/events');
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
