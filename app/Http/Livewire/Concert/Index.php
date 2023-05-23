<?php

namespace App\Http\Livewire\Concert;

use App\Models\Concert;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class Index extends Component implements HasTable
{
    use InteractsWithTable;
    public function render()
    {
        return view('livewire.concert.index');
    }

    protected function getTableQuery()
    {
        return Concert::query();
    }

    protected function getTableColumns()
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('title'),
            TextColumn::make('date'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->name('Upravit')
                ->url(fn (Concert $record): string => route('admin-concert-edit', $record)),
            Action::make('delete')
                ->name('Odstranit')
                ->action(fn (Concert $record): string => $record->delete())
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

}
