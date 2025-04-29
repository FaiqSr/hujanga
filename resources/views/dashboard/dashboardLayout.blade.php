<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-nav-bar-dashboard />
    <main class=" min-h-svh">

        <!-- Main Content -->
        <section class="lg:ml-72 transition-all">
            <header class="fixed right-0 z-10">
                <section class="p-2">

                    <nav
                        class=" px-5 py-2 lg:py-[0.85rem] flex justify-between items-center border-b border-gray-200 w-full bg-gray-50 z-50">
                        {{-- <section>
                            <h1 class="text-3xl font-sourGummy">HujanGa?</h1>
                        </section> --}}
                        <section class="lg:hidden">
                            <button class="flex items-center hover:bg-gray-100 p-2 rounded-lg" id="menu"
                                onclick="toggleSideBar()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
                                    viewBox="0 0 20 20" fill="none">
                                    <path fill="#000000" fill-rule="evenodd"
                                        d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z" />
                                </svg>
                            </button>
                        </section>
                    </nav>
                </section>
            </header>
            <section class="flex flex-col lg:flex-row justify-between gap-4">
                @yield('content')
            </section>
        </section>
    </main>
    @stack('scripts')
</body>

</html>
