<?php

namespace App\Http\Livewire\Introduction;

use App\Models\Introduction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Index extends Component implements HasForms
{
    use InteractsWithForms;

    public Introduction|null $introduction = null;
    public string $text;

    public function mount()
    {
        $this->introduction = Introduction::latest()->first();
        if (isset($this->introduction)) {
            $this->form->fill([
                'text' => $this->introduction->text,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.introduction.index', [
            'page_title' => 'Editace úvodního textu',
        ]);
    }

    protected function getFormSchema()
    {
        return [
            RichEditor::make('text')
                ->required(),
        ];
    }

    protected function getFormModel(): string
    {
        return Introduction::class;
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        $data['author_id'] = auth()->user()->id;

        Introduction::create($data);
        $this->introduction?->delete();

        Notification::make()
            ->title('Změny byly uloženy.')
            ->success()
            ->send();

        $this->redirect(route('admin-introduction'));
    }
}
