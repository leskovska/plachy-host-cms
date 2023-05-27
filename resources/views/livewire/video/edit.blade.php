<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form-wrapper
                        formAction="submit" cancelRoute="location.href='{{ route('admin-videos') }}'">
                        {{ $this->form }}
                    </x-form-wrapper>
                </div>
            </div>
        </div>
    </div>
</div>
