<div x-data="{ show: @entangle('show').defer }"
     x-show="show"
     x-trap="show"
     x-on:keydown.escape.window="show = false, $wire.closeModal()"
     class="fixed inset-0 z-40 px-4 py-6 overflow-y-auto md:py-24 sm:px-0" x-cloak>
    <div x-show="show" x-trap="show" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
         role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 text-center sm:p-0">
            <div x-on:click="show = false , $wire.closeModal()" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                 aria-hidden="true"></div>
            <div x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="bg-white z-50 min-w-[90%] lg:min-w-[40%] max-w-full px-8 py-8 rounded-lg">
                <div>
                    <div class="flex items-center mb-4">
                        <h1 class="text-xl text-gray-900">
                            {{ $title }}
                        </h1>
                    </div>
                    <p class="text-xs mb-4 text-center text-gray-600">{{ $text ?? "" }}</p>
                    <hr class="text-gray-500 w-full mb-4">
                    <div class="mt-2">
                        @isset($component)
                            <livewire:is :component="$component" :params="$params" />
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
