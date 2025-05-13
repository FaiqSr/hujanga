<aside class="fixed -translate-x-[500px]  p-5 justify-center min-h-svh z-40 w-80 transition-all" id="sidebar">
    <section
        class="flex flex-col w-full p-5 bg-slate-50 dark:bg-gray-800 dark:border-gray-700 rounded-lg border border-slate-200">
        <div class="flex items-center mb-3 border-b pb-5">
            @if (getUser()['photoUrl'] == '')
                <img src="{{ asset('assets/images/logos/waterDrop.png') }}" alt="" class="w-16 rounded-full">
            @else
                <img src="{{ getUser()['photoUrl'] }}" alt="" class="w-20 rounded-full mr-3">
            @endif
            <div>
                <h1 class="dark:text-white">HujanGa?</h1>
                <p class="dark:text-gray-300">{{ getUser()['first_name'] }}</p>
            </div>
        </div>
        <ul class="font-semibold font-sourGummy text-lg w-full">

            {{-- <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                <button
                    class="flex justify-between w-full items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    aria-controls="menu" aria-expanded="false" onclick="toggleMenu(3)">
                    <div class="flex" style="gap: 0.5rem;">
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5 15.25C10.307 15.2353 10.1276 15.1455 9.99998 15L6.99998 12C6.93314 11.8601 6.91133 11.7029 6.93756 11.55C6.96379 11.3971 7.03676 11.2562 7.14643 11.1465C7.2561 11.0368 7.39707 10.9638 7.54993 10.9376C7.70279 10.9114 7.86003 10.9332 7.99998 11L10.47 13.47L19 5.00004C19.1399 4.9332 19.2972 4.91139 19.45 4.93762C19.6029 4.96385 19.7439 5.03682 19.8535 5.14649C19.9632 5.25616 20.0362 5.39713 20.0624 5.54999C20.0886 5.70286 20.0668 5.86009 20 6.00004L11 15C10.8724 15.1455 10.6929 15.2353 10.5 15.25Z" />
                            <path
                                d="M12 21C10.3915 20.9974 8.813 20.5638 7.42891 19.7443C6.04481 18.9247 4.90566 17.7492 4.12999 16.34C3.54037 15.29 3.17596 14.1287 3.05999 12.93C2.87697 11.1721 3.2156 9.39921 4.03363 7.83249C4.85167 6.26578 6.1129 4.9746 7.65999 4.12003C8.71001 3.53041 9.87134 3.166 11.07 3.05003C12.2641 2.92157 13.4719 3.03725 14.62 3.39003C14.7224 3.4105 14.8195 3.45215 14.9049 3.51232C14.9903 3.57248 15.0622 3.64983 15.116 3.73941C15.1698 3.82898 15.2043 3.92881 15.2173 4.03249C15.2302 4.13616 15.2214 4.2414 15.1913 4.34146C15.1612 4.44152 15.1105 4.53419 15.0425 4.61352C14.9745 4.69286 14.8907 4.75712 14.7965 4.80217C14.7022 4.84723 14.5995 4.87209 14.4951 4.87516C14.3907 4.87824 14.2867 4.85946 14.19 4.82003C13.2186 4.52795 12.1987 4.43275 11.19 4.54003C10.193 4.64212 9.22694 4.94485 8.34999 5.43003C7.50512 5.89613 6.75813 6.52088 6.14999 7.27003C5.52385 8.03319 5.05628 8.91361 4.77467 9.85974C4.49307 10.8059 4.40308 11.7987 4.50999 12.78C4.61208 13.777 4.91482 14.7431 5.39999 15.62C5.86609 16.4649 6.49084 17.2119 7.23999 17.82C8.00315 18.4462 8.88357 18.9137 9.8297 19.1953C10.7758 19.4769 11.7686 19.5669 12.75 19.46C13.747 19.3579 14.713 19.0552 15.59 18.57C16.4349 18.1039 17.1818 17.4792 17.79 16.73C18.4161 15.9669 18.8837 15.0864 19.1653 14.1403C19.4469 13.1942 19.5369 12.2014 19.43 11.22C19.4201 11.1169 19.4307 11.0129 19.461 10.9139C19.4914 10.8149 19.5409 10.7228 19.6069 10.643C19.6728 10.5631 19.7538 10.497 19.8453 10.4485C19.9368 10.3999 20.0369 10.3699 20.14 10.36C20.2431 10.3502 20.3471 10.3607 20.4461 10.3911C20.5451 10.4214 20.6372 10.471 20.717 10.5369C20.7969 10.6028 20.863 10.6839 20.9115 10.7753C20.9601 10.8668 20.9901 10.9669 21 11.07C21.1821 12.829 20.842 14.6026 20.0221 16.1695C19.2022 17.7363 17.9389 19.0269 16.39 19.88C15.3288 20.4938 14.1495 20.8755 12.93 21C12.62 21 12.3 21 12 21Z" />
                        </svg>
                        <h5>Budgeting</h5>
                    </div>
                    <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="sideBarMenu3" hidden class="dark:text-gray-300">
                    <li>
                        <a href="/budgeting/bulan"
                            class="flex justify-between w-full items-center p-2 pl-[2.6rem] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <h5>Bulanan</h5>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                <a href="/rekapitulasi"
                    class="flex w-full items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    style="gap: 0.5rem;">
                    <svg fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px"
                        viewBox="0 0 495.398 495.398" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path
                                        d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391     v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158     c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747     c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z" />
                                    <path
                                        d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401     c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79     c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    Rekapitulasi Keuangan
                </a>
            </li> --}}
            <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                <a href="{{ route('map') }}"
                    class="flex w-full items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    style="gap: 0.5rem;">
                    <i class="fa-solid fa-map"></i>
                    Map
                </a>
            </li>

            @if (getUser()['role'] == 'admin')
                <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                    <button
                        class="flex justify-between w-full items-center rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                        aria-controls="menu" aria-expanded="false" onclick="toggleMenu(1)">
                        <div class="flex items-center" style="gap: 0.5rem;">
                            <i class="fa-solid fa-user-tie"></i>
                            <h5>Admin Dashboard</h5>
                        </div>
                        <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sideBarMenu1" hidden class="dark:text-gray-300">
                        <li>
                            <a href="{{ route('users') }}"
                                class="flex justify-between w-full items-center p-2 pl-[2.6rem] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                <h5>User Management</h5>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="/transaksi/pengeluaran"
                                class="flex justify-between w-full items-center p-2 pl-[2.6rem] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                <h5>Pengeluaran</h5>
                            </a>
                        </li> --}}
                        <li>
                            <a href="/transaksi/pengeluaran"
                                class="flex justify-between w-full items-center p-2 pl-[2.6rem] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">

                                <h5></i>Message</h5>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                <a href="{{ route('setting') }}"
                    class="flex w-full items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    style="gap: 0.5rem;">
                    <i class="fa-solid fa-gear"></i>
                    Setting
                </a>
            </li>
            <li class="text-gray-700 dark:text-gray-300 mb-2 hover:text-gray-900 dark:hover:text-white">
                <a href="/logout"
                    class="flex w-full items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                    style="gap: 0.5rem;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </li>
        </ul>
    </section>
</aside>
@push('scripts')
    <script>
        function toggleMenu(id) {
            const menu = document.getElementById(`sideBarMenu${id}`);
            const button = document.querySelector('button[aria-controls="menu"]');

            // Toggle visibility of the menu
            if (menu.hasAttribute("hidden")) {
                menu.removeAttribute("hidden");
                button.setAttribute("aria-expanded", "true");
            } else {
                menu.setAttribute("hidden", "");
                button.setAttribute("aria-expanded", "false");
            }
        }
    </script>
@endpush
