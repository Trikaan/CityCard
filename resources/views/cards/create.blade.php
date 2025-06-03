<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('cards.store') }}" class="max-w-md">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="number" :value="__('Card Number (Optional)')" />
                            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                            <p class="text-sm text-gray-600 mt-1">Leave empty to generate a random number.</p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Create Card') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 