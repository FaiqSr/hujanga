@extends('dashboard.dashboardLayout')

@section('title', 'Settings')

@section('content')
    <section class="p-4 lg:p-6 pt-24 lg:pt-24 w-full">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center">
                            <i class="fa-solid fa-gear mr-3 text-blue-500"></i>Account Settings
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your account preferences and security
                            settings</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500 dark:text-gray-400">User ID:
                            {{ substr(getUser()['uid'] ?? '', 0, 8) }}</span>
                    </div>
                </div>
            </div>

            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                <!-- Profile Section -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                            <i class="fa-solid fa-user-circle mr-2 text-blue-500"></i>Profile Information
                        </h3>
                        <span
                            class="text-xs px-2 py-1 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">{{ getUser()['role'] == 'admin' ? 'Admin' : 'User' }}</span>
                    </div>

                    <form class="space-y-6">
                        @csrf
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="flex-shrink-0 flex flex-col items-center">
                                <div class="relative group">
                                    @if (getUser()['photoUrl'] == '')
                                        <img src="{{ asset('assets/images/logos/waterDrop.png') }}" alt="Profile"
                                            id="profilePicture"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-md">
                                    @else
                                        <img src="{{ getUser()['photoUrl'] }}" alt="Profile" id="profilePicture"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-md">
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-30 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <i class="fa-solid fa-camera text-white text-xl"></i>
                                    </div>
                                </div>
                                <input type="file" id="profilePhotoInput" accept="image/*" class="hidden">
                                <button type="button" id="changePhotoBtn"
                                    class="mt-3 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                    Change Profile Photo
                                </button>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">JPG, GIF or PNG. Max 2MB</p>
                            </div>

                            <div class="flex-grow space-y-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">First
                                            Name</label>
                                        <input type="text" value="{{ getUser()['first_name'] }}"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all">
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Last
                                            Name</label>
                                        <input type="text" value="{{ getUser()['last_name'] ?? '' }}"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email
                                        Address</label>
                                    <input type="email" value="{{ getUser()['email'] }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all">
                                </div>

                                <div class="pt-2">
                                    <button type="submit"
                                        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm flex items-center">
                                        <i class="fa-solid fa-floppy-disk mr-2"></i>Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Security Section -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                            <i class="fa-solid fa-shield-alt mr-2 text-blue-500"></i>Security Settings
                        </h3>
                        <span
                            class="text-xs px-2 py-1 rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">Protected</span>
                    </div>

                    <div class="space-y-4">
                        @if (!getClaims()->get('firebase')['sign_in_provider'] == 'google.com')
                            <div
                                class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <div class="mb-3 sm:mb-0">
                                    <h4 class="font-medium text-gray-800 dark:text-white">Password</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Last changed 2 weeks ago</p>
                                </div>
                                <button type="button"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm">
                                    Change Password
                                </button>
                            </div>
                        @endif

                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Two-Factor Authentication</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Add an extra layer of security</p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-800 dark:text-white bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 rounded-lg transition-colors shadow-sm">
                                Set Up 2FA
                            </button>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Active Sessions</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">2 active sessions</p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-800 dark:text-white bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 rounded-lg transition-colors shadow-sm">
                                View Sessions
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Preferences Section -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center mb-5">
                        <i class="fa-solid fa-sliders-h mr-2 text-blue-500"></i>Preferences
                    </h3>

                    <div class="space-y-4">
                        <div
                            class="flex justify-between items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div>
                                <h4 class="font-medium text-gray-800 dark:text-white">Dark Mode</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Switch between light and dark themes</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="toggleDarkMode">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Email Notifications</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your notification preferences</p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-800 dark:text-white bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 rounded-lg transition-colors shadow-sm">
                                Configure
                            </button>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Language & Region</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">English (United States)</p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-800 dark:text-white bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 rounded-lg transition-colors shadow-sm">
                                Change
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="p-6 bg-red-50 dark:bg-gray-800 border-t border-red-200 dark:border-red-900/50">
                    <h3 class="text-lg font-semibold text-red-700 dark:text-red-400 flex items-center mb-5">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i>Danger Zone
                    </h3>

                    <div class="space-y-4">
                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-white dark:bg-gray-700 rounded-lg border border-red-200 dark:border-red-900">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Delete Account</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Permanently remove your account and all
                                    data</p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors shadow-sm">
                                Delete Account
                            </button>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-white dark:bg-gray-700 rounded-lg border border-red-200 dark:border-red-900">
                            <div class="mb-3 sm:mb-0">
                                <h4 class="font-medium text-gray-800 dark:text-white">Export Data</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Download all your data in JSON format
                                </p>
                            </div>
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-800 dark:text-white bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-500 rounded-lg transition-colors shadow-sm">
                                Export Data
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
        const darkModeToggle = document.getElementById('toggleDarkMode');

        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        });

        // Check for saved dark mode preference
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            darkModeToggle.checked = true;
            document.documentElement.classList.add('dark');
        }

        // Profile photo change functionality
        const changeBtn = document.getElementById('changePhotoBtn');
        const photoInput = document.getElementById('profilePhotoInput');
        const profile = document.getElementById('profilePicture');

        changeBtn.addEventListener('click', () => photoInput.click());

        photoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size should not exceed 2MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    profile.src = e.target.result;
                    // Here you would typically upload to your server
                    // uploadProfilePhoto(file);
                };
                reader.readAsDataURL(file);
            }
        });

        // Function to simulate profile photo upload
        function uploadProfilePhoto(file) {
            // This would be replaced with actual API call
            console.log('Uploading profile photo...');

            // Simulate upload delay
            setTimeout(() => {
                // Show success message
                const toast = document.createElement('div');
                toast.className =
                    'fixed bottom-4 right-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-lg flex items-center';
                toast.innerHTML = `
                    <i class="fa-solid fa-check-circle mr-2"></i>
                    Profile photo updated successfully!
                `;
                document.body.appendChild(toast);

                // Remove toast after 3 seconds
                setTimeout(() => {
                    toast.remove();
                }, 3000);
            }, 1500);
        }
    </script>
@endsection
