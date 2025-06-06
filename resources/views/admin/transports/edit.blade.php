<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transport') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.transports.update', $transport) }}" class="max-w-md">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="number" :value="__('Transport Number')" />
                            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number', $transport->number)" required autofocus />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="transport_type_id" :value="__('Transport Type')" />
                            <select id="transport_type_id" name="transport_type_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select Transport Type</option>
                                @foreach($transportTypes as $type)
                                    <option value="{{ $type->id }}" {{ (old('transport_type_id', $transport->transport_type_id) == $type->id) ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('transport_type_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="city_id" :value="__('City')" />
                            <select id="city_id" name="city_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ (old('city_id', $transport->city_id) == $city->id) ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Update Transport') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 