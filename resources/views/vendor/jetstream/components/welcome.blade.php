<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex md:inline-flex space-x-4">
        <x-jet-application-logo class="flex-1 h-12 w-auto" />
        <div class="mt-8 text-2xl text-center">
            Welcome to Admin Bedjoekopi
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('coffees.index') }}">Menu</a></div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('transactions.index') }}">Transaction</a></div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('users.index') }}">Users</a></div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('profile.show') }}">Profile</a></div>
        </div>
    </div>
</div>
