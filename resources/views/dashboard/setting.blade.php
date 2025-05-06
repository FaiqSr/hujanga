@extends('dashboard.dashboardLayout')

@section('title', 'Setting')

@section('content')
    <section class="p-4 lg:p-8 mt-16 lg:mt-0 w-full">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 border-b border-gray-200 dark:border-gray-700 pb-2">
                <i class="fa-solid fa-gear mr-2"></i>Settings
            </h2>

            <div class="space-y-8">
                <!-- Profile Section -->
                <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fa-solid fa-user mr-2"></i>Profile Settings
                    </h3>

                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0">
                            @if (getUser()['photoUrl'] == '')
                                <img src="{{ asset('assets/images/logos/waterDrop.png') }}" alt="Profile"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 dark:border-gray-600">
                            @else
                                <img src="{{ getUser()['photoUrl'] }}" alt="Profile"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 dark:border-gray-600">
                            @endif
                            <button class="mt-2 text-sm text-blue-600 dark:text-blue-400 hover:underline">
                                <i class="fa-solid fa-camera mr-1"></i>Change Photo
                            </button>
                        </div>

                        <div class="flex-grow space-y-4 w-full">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First
                                        Name</label>
                                    <input type="text" value="{{ getUser()['first_name'] }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last
                                        Name</label>
                                    <input type="text" value="{{ getUser()['last_name'] ?? '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                <input type="email" value="{{ getUser()['email'] }}"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                            </div>

                            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                <i class="fa-solid fa-floppy-disk mr-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Account Security -->
                <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fa-solid fa-shield-halved mr-2"></i>Account Security
                    </h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                            <div>
                                <h4 class="font-medium">Change Password</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Update your account password</p>
                            </div>
                            <button
                                class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                                Change
                            </button>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                            <div>
                                <h4 class="font-medium">Two-Factor Authentication</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Add an extra layer of security</p>
                            </div>
                            <button
                                class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                                Enable
                            </button>
                        </div>
                    </div>
                </div>

                <!-- App Preferences -->
                <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fa-solid fa-sliders mr-2"></i>App Preferences
                    </h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                            <div>
                                <h4 class="font-medium">Dark Mode</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Toggle between light and dark theme</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="toogleDarkMode">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                            <div>
                                <h4 class="font-medium">Notification Preferences</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Manage how you receive notifications</p>
                            </div>
                            <button
                                class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                                Configure
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-red-50 dark:bg-gray-700 p-5 rounded-lg border border-red-200 dark:border-red-900">
                    <h3 class="text-lg font-semibold mb-4 flex items-center text-red-700 dark:text-red-400">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i>Danger Zone
                    </h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-white dark:bg-gray-800 rounded-md shadow-sm">
                            <div>
                                <h4 class="font-medium">Delete Account</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Permanently delete your account and all
                                    data</p>
                            </div>
                            <button
                                class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script-bottom')
    <script>
        // Dark mode toggle functionality
        document.getElementById('toogleDarkMode').addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        });

        // Check
        // for saved dark mode preference
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.getElementById('toogleDarkMode').checked = true;
            document.documentElement.classList.add('dark');
        }
    </script>
@endsection
