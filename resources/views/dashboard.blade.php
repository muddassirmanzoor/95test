<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Welcome, {{ $user->name }}!</h3>
                        <p class="text-gray-600 dark:text-gray-400">You're successfully logged in to your account.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="font-medium mb-2">Profile Information</h4>
                            <div class="space-y-2 text-sm">
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
                                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                                <p><strong>Member since:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="font-medium mb-2">Quick Actions</h4>
                            <div class="space-y-2">
                                <a href="{{ route('profile') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    View Profile
                                </a>
                                <br>
                                <a href="{{ route('profile.edit') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>

                    @if($user->bio)
                    <div class="mt-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="font-medium mb-2">Bio</h4>
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->bio }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
