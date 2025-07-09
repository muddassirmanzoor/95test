<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold">User Profile</h3>
                        <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Profile
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Avatar Section -->
                        <div class="md:col-span-1">
                            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg text-center">
                                @if($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="Profile Avatar" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                @else
                                    <div class="w-32 h-32 rounded-full mx-auto mb-4 bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                        <span class="text-4xl text-gray-600 dark:text-gray-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                                <h4 class="text-xl font-semibold">{{ $user->name }}</h4>
                                <p class="text-gray-600 dark:text-gray-400">{{ ucfirst($user->role) }}</p>
                            </div>
                        </div>

                        <!-- Profile Details -->
                        <div class="md:col-span-2">
                            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold mb-4">Profile Details</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->phone ?? 'Not provided' }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ ucfirst($user->role) }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Member Since</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->created_at->format('F d, Y') }}</p>
                                    </div>

                                    @if($user->bio)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->bio }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- API Information -->
                    <div class="mt-6 bg-blue-50 dark:bg-blue-900 p-6 rounded-lg">
                        <h4 class="text-lg font-semibold mb-4 text-blue-800 dark:text-blue-200">API Access</h4>
                        <p class="text-blue-700 dark:text-blue-300 mb-4">
                            This application provides a RESTful API for user management. You can use the following endpoints:
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <h5 class="font-medium text-blue-800 dark:text-blue-200">Authentication</h5>
                                <ul class="mt-2 space-y-1 text-blue-700 dark:text-blue-300">
                                    <li>• POST /api/register - Register new user</li>
                                    <li>• POST /api/login - Login user</li>
                                    <li>• POST /api/logout - Logout user</li>
                                    <li>• GET /api/user - Get current user</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="font-medium text-blue-800 dark:text-blue-200">Profile Management</h5>
                                <ul class="mt-2 space-y-1 text-blue-700 dark:text-blue-300">
                                    <li>• GET /api/profile/me - Get own profile</li>
                                    <li>• GET /api/profiles - List all profiles (admin)</li>
                                    <li>• GET /api/profiles/{id} - Get specific profile</li>
                                    <li>• PUT /api/profiles/{id} - Update profile</li>
                                    <li>• DELETE /api/profiles/{id} - Delete profile (admin)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 