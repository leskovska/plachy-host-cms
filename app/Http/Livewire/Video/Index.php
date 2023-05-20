<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component implements HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public function render() {
        return view('livewire.video.index');
    }

    protected function getTableQuery(): Builder
    {
        return Video::query();
    }

    protected function getTableColumns() {
        return [
            TextColumn::make('id'),
            TextColumn::make('title'),
            TextColumn::make('slug'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->name('Upravit')
                ->url(fn (Video $record): string => route('admin-video-edit', $record)),
            Action::make('delete')
                ->name('Odstranit')
                ->action(fn (Video $record): string => $record->delete())
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }
}
