<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;

    public Video $video;
    public string $title;
    public string $slug;

    public function mount()
    {
        if (isset($this->video)) {
            $this->form->fill(
                [
                    'title' => $this->video->title,
                    'slug' => $this->video->slug,
                ]
            );
        } else {
            $this->video = new Video();
        }
    }
    public function render() {
        return view('livewire.video.edit', [
            'page_title' => $this->video->title ? 'Editace videa - ' . $this->video->title  : 'Nové video',
        ]);
    }

    protected function getFormSchema() {
        return [
            TextInput::make('title')
                ->name('Název')
                ->required(),
            TextInput::make('slug')
                ->name('Slug')
                ->required(),
        ];
    }

    protected function getFormModel()
    {
        return $this->video ?? Video::class;
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $this->video = Video::updateOrCreate(
            ['id' => $this->video?->id],
            $data
        );

        Notification::make()
            ->title('Změny byly uloženy.')
            ->success()
            ->send();

        $this->redirect(route('admin-videos'));
    }
}
