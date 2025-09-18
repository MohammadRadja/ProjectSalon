<x-dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-sm:text-lg">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    {{-- Add User Button --}}
    <div class="ml-5 my-2 max-sm:ml-2 max-sm:text-sm">
        <x-button>
            <a href="{{ route('users.create') }}">Add User</a>
        </x-button>
    </div>

    <div x-data="{ showModal: false }">
        <div class="overflow-auto rounded-lg border border-gray-200 shadow-md m-5 max-sm:m-2">

            {{-- Search Input --}}
            <form class="float-right max-sm:float-none max-sm:w-full w-1/2 sm:w-1/3 mb-4 max-sm:px-2 px-4"
                action="{{ route('manageusers') }}">
                <label for="default-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" value="{{ $search }}" name="search"
                        class="block w-full p-3 pl-10 text-sm max-sm:p-2 max-sm:pl-8 border border-gray-300 rounded-lg bg-gray-50 focus:ring-pink-500 focus:border-pink-500"
                        placeholder="Search Users...">
                    <button type="submit"
                        class="text-white absolute right-2 bottom-2 max-sm:right-1 max-sm:bottom-1 bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-3 py-1.5 max-sm:text-xs max-sm:px-2 max-sm:py-1">
                        Search
                    </button>
                </div>
            </form>

            {{-- User Table --}}
            <table class="w-full border-collapse bg-white text-left text-sm max-sm:text-xs text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="pl-6 py-4 font-medium text-gray-900 max-sm:pl-2 max-sm:py-2">Id</th>
                        <th class="px-4 py-4 font-medium text-gray-900 max-sm:px-2 max-sm:py-2">User</th>
                        <th class="px-6 py-4 font-medium text-gray-900 max-sm:px-2 max-sm:py-2">Status</th>
                        <th class="px-6 py-4 font-medium text-gray-900 max-sm:px-2 max-sm:py-2">Role</th>
                        <th class="px-6 py-4 font-medium text-gray-900 max-sm:px-2 max-sm:py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="pl-6 py-2 max-sm:pl-2 max-sm:py-1 whitespace-nowrap">
                                {{ $user->id }}
                            </td>

                            <th
                                class="flex gap-2 px-6 py-2 font-normal text-gray-900 items-center max-sm:px-2 max-sm:py-1 max-sm:gap-1">
                                <div class="h-10 w-10 max-sm:h-7 max-sm:w-7 shrink-0">
                                    <img alt="{{ $user->name }}"
                                        class="h-full w-full rounded-full object-cover object-center"
                                        src="{{ $user->profile_photo_url }}" />
                                </div>
                                <div class="text-sm max-sm:text-xs leading-tight max-sm:max-w-[100px] max-sm:truncate">
                                    <div class="font-medium text-gray-700 whitespace-nowrap">{{ $user->name }}</div>
                                    <div class="text-gray-400 truncate max-w-[150px] hidden sm:block">
                                        {{ $user->email }}
                                    </div>
                                    <div class="text-gray-400 text-xs hidden sm:block">{{ $user->phone_number }}</div>
                                </div>
                            </th>

                            <td class="px-6 py-2 max-sm:px-2 max-sm:py-1 whitespace-nowrap">
                                @if ($user->status)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                        Suspended
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-2 max-sm:px-2 max-sm:py-1 whitespace-nowrap">
                                {{ $user->role->name }}
                            </td>

                            <td class="px-6 py-2 max-sm:px-2 max-sm:py-1 whitespace-nowrap">
                                <div class="flex gap-2 max-sm:gap-1 flex-wrap">
                                    @if ($user->role()->first()->name !== 'Admin')
                                        @if ($user->status)
                                            <form action="{{ route('manageusers.suspend', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="bg-red-50 p-1 px-2 rounded-md text-red-600 hover:text-red-900 max-sm:text-[10px] max-sm:px-1">
                                                    Suspend
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('manageusers.activate', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="bg-green-50 p-1 px-2 rounded-md text-green-600 hover:text-green-900 max-sm:text-[10px] max-sm:px-1">
                                                    Activate
                                                </button>
                                            </form>
                                        @endif
                                    @endif

                                    @if ($user->role()->first()->name === 'Customer')
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="bg-blue-50 p-1 px-2 rounded-md text-blue-600 hover:text-blue-900 max-sm:text-[10px] max-sm:px-1">
                                            View
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="p-5 max-sm:px-2 max-sm:py-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-dashboard>
