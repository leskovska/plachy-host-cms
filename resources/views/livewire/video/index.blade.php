<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Videa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="mt-6 mx-6">
                    <x-secondary-button onClick="location.href='{{route('admin-video-new')}}'"
                    >Přidat nové video</x-secondary-button>
                </div>
                <div class="p-6 text-gray-900">
                    {{ $this->table }}
                </div>
            </div>
        </div>
    </div>
</div>
