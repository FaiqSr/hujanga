<header
    class="flex justify-between px-5 py-4 items-center backdrop-blur-sm fixed w-full z-50 shadow-lg sm:justify-around">
    <nav class="flex gap-5 items-center">
        <a href="/" class="font-bold text-2xl flex"><img width="150px" height="20px"
                src="{{ asset('assets/images/logos/logo.png') }}" alt="">
        </a>
        <ul class="hidden gap-10 sm:flex">
            <li><a href="{{ route('home') }}"
                    class=" {{ Route::currentRouteName() === 'home' ? 'text-blue-500 font-semibold' : '' }}">Home</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class=" {{ Route::currentRouteName() === 'about' ? 'text-blue-500 font-semibold' : '' }}">About
                    Us</a></li>
            <li><a href="{{ route('contact') }}"
                    class=" {{ Route::currentRouteName() === 'contact' ? 'text-blue-500 font-semibold' : '' }}">Contact
                    us</a></li>
            <li><a href="/">Map</a></li>
        </ul>
    </nav>
    <section class="flex gap-2">
        <button id="dark-toggle"
            class="border-[0.5px] border-slate-300 dark:border-slate-500 cursor-pointer rounded-lg p-2"></button>
        <section class="flex gap-5">
            <button class="cursor-pointer">
                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z"
                        stroke="#0288c7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z"
                        stroke="#0288c7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        stroke="#029dc5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </section>
    </section>
    <script>
        const darkToggle = document.getElementById('dark-toggle');

        // Fungsi untuk mengganti tema
        const changeTheme = () => {
            const currentTheme = localStorage.getItem('color-theme');

            if (currentTheme === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
                darkToggle.innerHTML = `
                    <!-- Ikon Matahari (Light) -->
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#a)" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10">
                            <path d="M5 12H1M23 12h-4M7.05 7.05 4.222 4.222M19.778 19.778 16.95 16.95M7.05 16.95l-2.828 2.828M19.778 4.222 16.95 7.05" stroke-linecap="round"/>
                            <path d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" fill="#000000" fill-opacity=".16"/>
                            <path d="M12 19v4M12 1v4" stroke-linecap="round"/>
                        </g>
                        <defs><clipPath id="a"><path fill="#ffffff" d="M0 0h24v24H0z"/></clipPath></defs>
                    </svg>`;
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                darkToggle.innerHTML = `
                    <!-- Ikon Bulan (Dark) -->
                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.44,34.68a18.22,18.22,0,0,1-2.94-.24,18.18,18.18,0,0,1-15-20.86A18.06,18.06,0,0,1,9.59.63,2.42,2.42,0,0,1,12.2.79a2.39,2.39,0,0,1,1,2.41L11.9,3.1l1.23.22A15.66,15.66,0,0,0,23.34,21h0a15.82,15.82,0,0,0,8.47.53A2.44,2.44,0,0,1,34.47,25,18.18,18.18,0,0,1,18.44,34.68Z"/>
                    </svg>`;
            }
        }

        // Set awal tema saat halaman dimuat
        const storedTheme = localStorage.getItem('color-theme');
        if (storedTheme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        // Set ikon awal
        changeTheme(); // untuk set ikon awal sesuai kondisi localStorage

        // Tambahkan event listener
        darkToggle.addEventListener('click', changeTheme);
    </script>
</header>
