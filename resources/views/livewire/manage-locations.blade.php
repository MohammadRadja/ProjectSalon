<div>
    <div>
        <!-- Header: Title + Create Button -->
        <div class="flex justify-between mx-7 max-sm:flex-col max-sm:items-start max-sm:gap-3 max-sm:mx-4">
            <h2 class="text-2xl font-bold max-sm:text-lg">Locations</h2>

            <x-button wire:click="confirmLocationAdd"
                class="px-5 py-2 text-white bg-pink-500 rounded-md hover:bg-pink-600 max-sm:px-4 max-sm:py-1.5 max-sm:text-sm">
                Create
            </x-button>
        </div>

        <!-- Session Message -->
        <div class="mt-4 max-sm:mx-4">
            @if (session()->has('message'))
                <div class="px-4 py-2 text-white bg-green-500 rounded-md text-sm max-sm:text-xs">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <!-- Table Container -->
        <div class="flex flex-col gap-4 m-5 max-sm:m-3">

            <!-- Search Bar -->
            <div class="self-end w-1/3 max-sm:w-full max-sm:self-auto max-sm:mx-0">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" wire:model="search" id="default-search" name="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search Locations...">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2">
                        Search
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-auto rounded-lg border border-gray-200 shadow-md">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="pl-6 py-4 font-medium text-gray-900 max-sm:hidden">Id</th>
                            <th class="px-4 py-4 font-medium text-gray-900">Name</th>
                            <th class="px-4 py-4 font-medium text-gray-900">Address</th>
                            <th class="px-4 py-4 font-medium text-gray-900 max-sm:hidden">Telephone</th>
                            <th class="px-4 py-4 font-medium text-gray-900">Active</th>
                            <th class="px-4 py-4 font-medium text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($locations as $location)
                            <tr class="hover:bg-gray-50">
                                <td class="pl-6 py-4 max-sm:hidden">{{ $location->id }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $location->name }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $location->address }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium max-sm:hidden">
                                    {{ $location->telephone_number }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $location->status ? 'Yes' : 'No' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-1 flex-wrap">
                                        <x-button wire:click="confirmLocationEdit({{ $location->id }})"
                                            wire:loading.attr="disabled" class="max-sm:text-xs max-sm:px-2 max-sm:py-1">
                                            {{ __('Edit') }}
                                        </x-button>
                                        <x-danger-button wire:click="confirmLocationDeletion({{ $location->id }})"
                                            wire:loading.attr="disabled" class="max-sm:text-xs max-sm:px-2 max-sm:py-1">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-5 max-sm:p-3">
                {{ $locations->links() }}
            </div>

            <!-- Delete Modal -->
            <x-dialog-modal wire:model="confirmingLocationDeletion">
                <x-slot name="title">
                    {{ __('Delete Location') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete the location?') }}
                </x-slot>

                <x-slot name="footer">
                    <div class="flex gap-3">
                        <x-secondary-button wire:click="$set('confirmingLocationDeletion', false)"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button wire:click="deleteLocation({{ $confirmingLocationDeletion }})"
                            wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </div>
                </x-slot>
            </x-dialog-modal>

            {{-- Add/Update Modal --}}
            <x-dialog-modal wire:model="confirmingLocationAdd">
                <x-slot name="title">
                    {{ isset($this->location->id) ? 'Edit Location' : 'Add Location' }}
                </x-slot>

                <x-slot name="content">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" wire:model="location.name" id="name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            @error('location.name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea wire:model="location.address" id="address"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"></textarea>
                            @error('location.address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="telephone_number" class="block text-sm font-medium text-gray-700">Telephone
                                Number</label>
                            <input type="tel" wire:model="location.telephone_number" minlength="10" maxlength="10"
                                id="telephone_number"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            @error('location.telephone_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Is Operating</label>
                            <input type="checkbox" wire:model="location.status" id="status"
                                class="mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            @error('location.status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <x-secondary-button wire:click="$set('confirmingLocationAdd', false)"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                        <x-button wire:click="saveLocation">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-dialog-modal>
        </div>
    </div>
</div>
