@props([
    'formAction' => false,
    'submit' => 'Odeslat',
    'cancel' => 'Zrušit',
    'cancelRoute' => false
])

<div>
    @if ($formAction)
        <form
            x-data="{ buttonDisabled: false }"
            x-on:submit="buttonDisabled = true"
            wire:submit.prevent="submit">
    @endif

    {{ $slot }}

    @if ($formAction)
        <x-form-buttons-wrapper>
            @if ($cancel !== "false")
                <x-button onClick="{{ $cancelRoute }}" type="button" color="secondary" size="lg"
                    class="mr-2">{{ $cancel }}
                </x-button>
            @endif
            <x-button type="submit" color="success" size="lg" x-bind:disabled="buttonDisabled">{{ $submit }}
            </x-button>
        </x-form-buttons-wrapper>
        </form>
    @endif
</div>
