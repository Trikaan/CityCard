<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">{{ __('Admin Management') }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <a href="{{ route('admin.cities.index') }}" class="block p-6 bg-white border rounded-lg hover:bg-gray-50">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ __('Cities') }}</h5>
                            <p class="font-normal text-gray-700">{{ __('Manage cities and their settings') }}</p>
                        </a>

                        <a href="{{ route('admin.transport-types.index') }}" class="block p-6 bg-white border rounded-lg hover:bg-gray-50">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ __('Transport Types') }}</h5>
                            <p class="font-normal text-gray-700">{{ __('Manage different types of transport') }}</p>
                        </a>

                        <a href="{{ route('admin.transports.index') }}" class="block p-6 bg-white border rounded-lg hover:bg-gray-50">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ __('Transports') }}</h5>
                            <p class="font-normal text-gray-700">{{ __('Manage transport vehicles and routes') }}</p>
                        </a>

                        <a href="{{ route('admin.ticket-types.index') }}" class="block p-6 bg-white border rounded-lg hover:bg-gray-50">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ __('Ticket Types') }}</h5>
                            <p class="font-normal text-gray-700">{{ __('Manage ticket types and pricing') }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 