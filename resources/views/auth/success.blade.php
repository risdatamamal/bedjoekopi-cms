<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="mt-4 text-center font-bold">
            <h2>Register success</h2>
        </div>



        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="flex items-center justify-end mt-4">
                @if (Auth::user()->roles == 'ADMIN')
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 mx-2"
                        href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log out') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
