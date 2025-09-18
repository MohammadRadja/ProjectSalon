<x-dashboard>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-sm:text-lg">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('manageusers') }}" method="post"
            class="w-1/2 mx-auto bg-white rounded-lg p-5
           max-sm:w-full max-sm:max-w-md max-sm:ml-auto max-sm:mr-0 max-sm:px-4 max-sm:py-3 max-sm:rounded-lg">
            @csrf

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="name" value="{{ __('Name') }}" class="max-sm:text-sm" />
                <x-input id="name" type="text" class="mt-1 block w-full max-sm:text-sm" name="name" />
                <x-input-error for="name" class="mt-2 max-sm:text-xs" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="email" value="{{ __('Email') }}" class="max-sm:text-sm" />
                <x-input id="email" type="email" class="mt-1 block w-full max-sm:text-sm" name="email" />
                <x-input-error for="email" class="mt-2 max-sm:text-xs" />
            </div>

            <!-- Phone Number -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="phone_number" value="{{ __('Phone Number') }}" class="max-sm:text-sm" />
                <span class="text-xs">eg: 0112121211</span>
                <x-input id="phone_number" type="text" class="mt-1 block w-full max-sm:text-sm"
                    name="phone_number" />
                <x-input-error for="phone_number" class="mt-2 max-sm:text-xs" />
            </div>

            <!-- Password -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="password" value="{{ __('Password') }}" class="max-sm:text-sm" />
                <x-input id="password" type="password" class="mt-1 block w-full max-sm:text-sm" name="password" />
                <x-input-error for="password" class="mt-2 max-sm:text-xs" />
            </div>

            <!-- Confirm Password -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="max-sm:text-sm" />
                <x-input id="password_confirmation" type="password" class="mt-1 block w-full max-sm:text-sm"
                    name="password_confirmation" />
                <x-input-error for="password_confirmation" class="mt-2 max-sm:text-xs" />
            </div>

            <!-- Role -->
            <div class="col-span-6 sm:col-span-4 my-2">
                <x-label for="role" value="{{ __('Role') }}" class="max-sm:text-sm" />
                <select name="role" id="role"
                    class="border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded-md shadow-sm max-sm:text-sm">
                    <option value="employee">Employee</option>
                    <option value="customer">Customer</option>
                </select>
                <x-input-error for="role" class="mt-2 max-sm:text-xs" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 max-sm:text-sm max-sm:px-4 max-sm:py-2">
                    {{ __('Create User') }}
                </x-button>
            </div>
        </form>
    </div>

</x-dashboard>
