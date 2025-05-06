<header class="fixed w-full z-50 shadow-lg sm:justify-around backdrop-blur-sm">
    <section class="flex justify-between px-5 py-4 items-center  sm:justify-around">

        <nav class="flex gap-5 items-center">
            <a href="/" class="font-bold text-2xl flex"><img width="150px" height="20px"
                    src="{{ asset('assets/images/logos/logo.png') }}" alt="">
            </a>
            <ul class="hidden gap-10 sm:flex transition-all duration-500 ease-in-out">
                <li><a href="{{ route('home') }}"
                        class=" {{ Route::currentRouteName() === 'home' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out">Home</a>
                </li>
                <li><a href="{{ route('about') }}"
                        class=" {{ Route::currentRouteName() === 'about' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out">About
                        Us</a></li>
                <li><a href="{{ route('contact') }}"
                        class=" {{ Route::currentRouteName() === 'contact' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out">Contact
                        us</a></li>
                <li><a href="/dashboard/map"
                        class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out">Map</a></li>
            </ul>
        </nav>
        <section class="flex gap-2">
            <button id="dark-toggle"
                class="border border-primary cursor-pointer rounded-lg p-2 px-4 text-xl text-primary dark:text-secondary dark:border-secondary"></button>
            <section class="flex sm:hidden">
                <button onclick="" id="menu-toggle"
                    class="cursor-pointer text-xl border border-third rounded-lg p-2 px-4 text-secondary dark:text-primary dark:border-primary"><i
                        class="fa-solid fa-bars"></i></button>
            </section>
            <section class="gap-5 hidden sm:flex relative">
                @if (!userAuth())
                    <button id="profile-button"
                        class="cursor-pointer text-xl border border-third rounded-lg p-2 px-3 text-secondary dark:text-primary dark:border-primary">
                        <i class="fa-solid fa-user"></i>
                    </button>
                @else
                    @if (getUser()['photoUrl'] == '')
                        <button id="profile-button"
                            class="cursor-pointer text-xl border border-third rounded-lg p-2 px-3 text-secondary dark:text-primary dark:border-primary">
                            <i class="fa-solid fa-user"></i>
                        </button>
                    @else
                        <button id="profile-button"
                            class="cursor-pointer text-xl border border-third rounded-lg p-1 px-2 text-secondary dark:text-primary dark:border-primary">
                            <img src="{{ getUser()['photoUrl'] }}" alt="" width="30px"
                                class="object-cover rounded-sm">
                        </button>
                    @endif
                @endif

                <section id="profile-dropdown" hidden
                    class="absolute right-0 mt-16 bg-white dark:bg-slate-800 shadow-lg rounded-lg w-40 py-2 text-center z-50 h-fit">
                    <section class="flex flex-col gap-2 py-2">
                        @if (!userAuth())
                            <a href="/login"
                                class="block px-4 py-2 text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Login</a>
                            <a href="/register"
                                class="block px-4 py-2 text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Sign
                                Up</a>
                        @else
                            <a href="/dashboard/map"
                                class="block px-4 py-2 text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                            <a href="/logout"
                                class="block px-4 py-2 text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Logout</a>
                        @endif
                    </section>
                </section>
            </section>

        </section>
    </section>
    <aside class="flex justify-center sm:hidden py-10 " id="sideBar" hidden>
        <nav>
            <ul class=" gap-10 flex flex-col items-center transition-all duration-500 ease-in-out">
                <li><a href="{{ route('home') }}"
                        class=" {{ Route::currentRouteName() === 'home' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Home</a>
                </li>
                <li><a href="{{ route('about') }}"
                        class=" {{ Route::currentRouteName() === 'about' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">About
                        Us</a></li>
                <li><a href="{{ route('contact') }}"
                        class=" {{ Route::currentRouteName() === 'contact' ? 'text-blue-500 font-semibold' : '' }} hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Contact
                        us</a></li>
                <li><a href="/"
                        class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Map</a>
                </li>
                <section class="flex gap-10">
                    @if (!userAuth())
                        <a href="/login"
                            class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Login</a>
                        <a href="/register"
                            class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">SignUp</a>
                    @else
                        <a href="/dashboard/map"
                            class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Dashboard</a>
                        <a href="/logout"
                            class="hover:text-blue-500 font-semibold transition-all duration-100 ease-in-out border-b border-slate-800 dark:border-slate-200">Logout</a>
                    @endif
                </section>
            </ul>
        </nav>
    </aside>
</header>

@push('scripts')
    <script>
        const darkToggle = document.getElementById('dark-toggle');

        // Fungsi untuk mengganti tema
        const changeTheme = () => {
            const currentTheme = localStorage.getItem('color-theme');

            if (currentTheme === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
                darkToggle.innerHTML = `<i class="fa-regular fa-lightbulb"></i>`;
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                darkToggle.innerHTML = `<i class="fa-solid fa-moon"></i>`;
            }
        }

        // Set awal tema saat halaman dimuat
        const storedTheme = localStorage.getItem('color-theme');
        if (storedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            darkToggle.innerHTML = `<i class="fa-solid fa-moon"></i>`;
        } else {
            document.documentElement.classList.remove('dark');
            darkToggle.innerHTML = `<i class="fa-regular fa-lightbulb"></i>`;
        }

        // Set ikon awal
        // changeTheme(); // untuk set ikon awal sesuai kondisi localStorage

        // Tambahkan event listener
        darkToggle.addEventListener('click', changeTheme);
    </script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sideBar = document.getElementById('sideBar');

        menuToggle.addEventListener('click', () => {
            if (sideBar.hasAttribute('hidden')) {
                sideBar.removeAttribute('hidden');
            } else {
                sideBar.setAttribute('hidden', true);
            }
        });
    </script>
    <script>
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileButton.addEventListener('click', () => {
            if (profileDropdown.hasAttribute('hidden')) {
                profileDropdown.removeAttribute('hidden');
            } else {
                profileDropdown.setAttribute('hidden', true);
            }
        });

        // Optional: klik di luar dropdown akan menutup dropdown
        window.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.setAttribute('hidden', true);
            }
        });
    </script>
@endpush
