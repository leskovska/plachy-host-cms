<?php

namespace App\Http\Livewire\Introduction;

use App\Models\Introduction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class ImageForm extends Component implements HasForms
{
    use InteractsWithForms;
    public Introduction|null $introduction = null;

    public function mount()
    {
        $this->introduction = Introduction::latest()->first();

        if (isset($this->introduction)) {
            $this->form->fill([
                'document' => optional($this->introduction->getFirstMediaUrl('introductions'))->getUrl(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.introduction.image-form');
    }
    protected function getFormSchema()
    {
        return [
            SpatieMediaLibraryFileUpload::make('document')
                ->label('Úvodní brázek')
                ->acceptedFileTypes(['image/*'])
                ->responsiveImages()
                ->collection('introduction'),
        ];
    }

    protected function getFormModel(): string
    {
        return Introduction::class;
    }

    public function submit(): void
    {
        $this->form->model($this->introduction)->saveRelationships();

        Notification::make()
            ->title('Změny byly uloženy.')
            ->success()
            ->send();

        $this->redirect(route('admin-introduction'));
    }
}
