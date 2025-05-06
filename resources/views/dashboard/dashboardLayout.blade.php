<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- @stack('scripts') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="dark:bg-gray-900 bg-slate-50 dark:text-white text-black transition-colors duration-500">
    <x-nav-bar-dashboard />
    <main class=" min-h-svh">
        <!-- Main Content -->
        <section class="lg:ml-72 transition-all">
            <header class="fixed right-0 z-10 lg:hidden">
                <section class="p-4">

                    <navp
                        class="px-3 py-2 lg:py-[0.85rem] flex justify-between items-center bg-gray-50 dark:bg-gray-800 w-full  z-50 rounded-lg">
                        {{-- <section>
                            <h1 class="text-3xl font-sourGummy">HujanGa?</h1>
                        </section> --}}
                        <section class="">
                            <button class="flex items-center text-3xl rounded-lg" id="menu"
                                onclick="toggleSideBar()">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </section>
                    </navp>
                </section>
            </header>
            <section class="flex flex-col lg:flex-row justify-between gap-4">
                @yield('content')
            </section>
        </section>
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
    @yield('script-bottom')
    @stack('scripts')
</body>

</html>
