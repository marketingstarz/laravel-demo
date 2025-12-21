<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Welcome to the Dashboard</h2>
                    <p class="mb-4">This is your personal dashboard. Here you can manage yozur account, view notifications, and access various features of the application.</p>
                    <ul class="list-disc list-inside">
                        <li><a href="/profile">Manage your profile information</a></li>
                        <li>View and manage your orders</li>
                        <li>Subscribe to newsletters</li>
                        <li>Access customer support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="/posts/" class="inline-flex items-center justify-center bg-blue-600 text-white font-semibold rounded-md px-8 py-4 hover:bg-blue-700 transition">View Posts</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
