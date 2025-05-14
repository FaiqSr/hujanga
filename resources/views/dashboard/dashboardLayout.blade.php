<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- @stack('scripts') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (getUser()['role'] == 'admin')
        @vite('resources/js/notifications/notifications.js')
    @endif
    @yield('top-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="dark:bg-gray-900 bg-slate-50 dark:text-white text-black transition-colors duration-500">
    <x-nav-bar-dashboard />
    <main class="min-h-svh">
        <!-- Main Content -->
        <section class="transition-all">
            <header class="fixed z-30 w-full p-4 right-0 ">
                <section class="p-1 bg-gray-50 dark:bg-gray-800 lg:w-full flex justify-end rounded-lg gap-7">

                    @if (getUser()['role'] == 'admin')
                        <section class="flex items-center">
                            <button class="flex items-center" onclick="toggleNotificationModal()">
                                <i class="fa-solid fa-bell text-2xl"></i>
                                <span id="notification-number"
                                    class="absolute -mt-4 ml-4 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                            </button>
                        </section>
                    @endif
                    <nav class="px-2 py-2 lg:py-[0.85rem] flex justify-between items-center">
                        <section class="">
                            <button class="flex items-center text-3xl" id="menu" onclick="toggleSideBar()">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </section>
                    </nav>
                </section>
            </header>
            <section class="flex flex-col lg:flex-row justify-between gap-4">
                @yield('content')
            </section>
        </section>


        @if (getUser()['role'] == 'admin')
            <!-- Notification Modal -->
            <div id="notificationModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <!-- Modal panel -->
                    <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white"
                                    id="modal-headline">
                                    Notifications
                                </h3>
                                <button type="button" class="text-gray-400 hover:text-gray-500"
                                    onclick="toggleNotificationModal()">
                                    <span class="sr-only">Close</span>
                                    <i class="fa-solid fa-times"></i>
                                </button>
                            </div>

                            <div class="max-h-96 overflow-y-auto" id="notification-items">

                            </div>
                        </div>
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                id="markAsReadNotificationButton">
                                Mark all as read
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                onclick="toggleNotificationModal()">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
    <script>
        function toggleSideBar() {
            const sideBar = document.getElementById('sidebar')
            const menu = document.getElementById('menu')

            if (sideBar.classList.contains('translate-x-0')) {
                sideBar.classList.remove('translate-x-0')
                sideBar.classList.add('-translate-x-[500px]')

            } else {
                sideBar.classList.remove('-translate-x-[500px]')
                sideBar.classList.add('translate-x-0')
            }
        }
    </script>

    @if (getUser()['role'] == 'admin')
        <script>
            function toggleNotificationModal() {
                const modal = document.getElementById('notificationModal');
                if (modal.classList.contains('hidden')) {
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                } else {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            }
        </script>
    @endif
    @yield('script-bottom')
    @stack('scripts')
</body>

</html>
