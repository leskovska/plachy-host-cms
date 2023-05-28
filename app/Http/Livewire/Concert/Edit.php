<?php

namespace App\Http\Livewire\Concert;

use App\Models\Concert;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;

    public Concert $concert;
    public string $title;
    public string $date;
    public null|array $document = null;

    public function mount()
    {
        if (isset($this->concert)) {
            $this->form->fill(
                [
                    'title' => $this->concert->title,
                    'date' => $this->concert->date,
                    'document' => optional(
                        $this->concert->getFirstMediaUrl('concerts'))->getUrl(),
                ]
            );
        } else {
            $this->concert = new Concert();
        }
    }
    public function render() {
        return view('livewire.concert.edit', [
            'page_title' => $this->concert->title ? 'Editace koncertu - ' . $this->concert->title  : 'Nový koncert',
        ]);
    }

    protected function getFormSchema() {
        return [
            TextInput::make('title')
                ->name('Název')
                ->required(),
            DateTimePicker::make('date')
                ->name('Datum')
                ->withoutTime()
                ->displayFormat('d. m. Y')
                ->required(),
            SpatieMediaLibraryFileUpload::make('document')
                ->label('Obrázek')
                ->nullable()
                ->acceptedFileTypes(['image/*'])
                ->responsiveImages()
                ->collection('concert'),
        ];
    }

    protected function getFormModel()
    {
        return $this->concert ?? Concert::class;
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        $concert = Concert::updateOrCreate(
            ['id' => $this->concert?->id],
            $data
        );
        $this->form->model($concert)->saveRelationships();

        Notification::make()
            ->title('Změny byly uloženy.')
            ->success()
            ->send();

        $this->redirect(route('admin-concerts'));
    }
}
