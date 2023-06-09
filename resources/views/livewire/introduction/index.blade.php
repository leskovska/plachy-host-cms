<div>
    <x-slot name="header">
        <h2>{{ $page_title }}</h2>
    </x-slot>
    @if($introduction)
        <div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3>Úvodní obrázek</h3>
                        <div>{{ $introduction->getFirstMedia('introduction') }}</div>
                        <div class="py-6 text-gray-900">
                            <x-primary-button
                                onClick="Livewire.emit('openModal',
                                        'introduction.image-form',
                                        'Vložit obrázek')"
                            >Změnit úvodní obrázek
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3>Úvodní text</h3>
                    <div class="text-gray-900">
                        <x-form-wrapper
                            formAction="submit" cancelRoute="location.href='{{ route('admin-introduction') }}'"
                        >{{ $this->form }}
                        </x-form-wrapper>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
