@extends('templateLayout')

@section('title', 'Register')

@section('content')
    <main
        class="bg-gradient-to-br from-gray-100 via-blue-50 to-purple-100 flex items-center justify-center min-h-screen dark:bg-gradient-to-t dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 transition-colors ease-in-out duration-500">

        <section class="sm:min-w-1/2 min-h-svh hidden sm:flex justify-center items-center">

            <section
                class="w-fit h-[350px] sm:h-[450px] lg:h-[500px] rounded-lg flex items-center shadow-xl border border-slate-200 dark:border-gray-700 hover:dark:border-white transition-colors">
                <img src="{{ asset('assets/images/logos/logo.png') }}" alt="">
            </section>
        </section>
        <section class=" p-8 pt-28  w-full min-h-svh dark:text-white">
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800 dark:text-white">Daftar Akun Baru</h2>

            <form action="/register" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <section>
                    <label for="first_name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama
                        depan</label>
                    <input type="text" id="last_name" name="first_name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </section>

                <section>
                    <label for="last_name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama
                        belakang</label>
                    <input type="text" id="last_name" name="last_name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </section>

                <section>
                    <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </section>

                <section>
                    <label for="password"
                        class="block text-sm font-medium text-gray-600 dark:text-gray-300">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </section>

                <section>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-600 dark:text-gray-300">Konfirmasi password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                </section>

                <section class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600" />
                    <label for="terms" class="ml-2 block text-sm text-gray-600 dark:text-gray-300">
                        Saya menyetujui <a href="#" class="text-blue-500 hover:underline">Syarat & Ketentuan</a>
                    </label>
                </section>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Daftar
                </button>
            </form>

            <section class="flex flex-col items-center gap-2 mt-5">
                <section>
                    <p class="text-sm text-slate-600 dark:text-gray-300">Atau daftar dengan</p>
                </section>
                <section class="flex items-center gap-10 justify-center">
                    <button id="google-button" class="cursor-pointer">
                        <img width="50px" src="{{ asset('assets/images/loginpages/google.png') }}" alt="Google">
                    </button>
                    <button id="facebook-button" class="cursor-pointer">
                        <img width="35px" src="{{ asset('assets/images/loginpages/facebook.png') }}" alt="Facebook">
                    </button>
                </section>
            </section>

            <p class="text-sm text-center text-gray-500 dark:text-gray-400 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk disini</a>
            </p>
        </section>

    </main>
@endsection

@push('scripts')
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
        import {
            GoogleAuthProvider,
            FacebookAuthProvider,
            getAuth,
            signInWithPopup
        } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js"

        const firebaseConfig = {
            apiKey: "AIzaSyCWj-q9H9eIbh8u642FcPgJJGZ6AmnNeMw",
            authDomain: "projectapmo5.firebaseapp.com",
            databaseURL: "https://projectapmo5-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "projectapmo5",
            storageBucket: "projectapmo5.firebasestorage.app",
            messagingSenderId: "276690538161",
            appId: "1:276690538161:web:7cd4847d9c0eab4e71dc90",
            measurementId: "G-YF5YDTK0P6"
        };

        const googleButton = document.getElementById('google-button');
        const facebookButton = document.getElementById('facebook-button');

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const googleProvider = new GoogleAuthProvider();
        const facebookProvider = new FacebookAuthProvider();
        const auth = getAuth();

        googleButton.addEventListener('click', async () => {
            await signInWithPopup(auth, googleProvider)
                .then((result) => {
                    const credential = GoogleAuthProvider.credentialFromResult(result);
                    const token = credential.accessToken;
                    const user = result.user;

                    localStorage.setItem('accessToken', user.stsTokenManager.accessToken);
                    localStorage.setItem('refreshToken', user.stsTokenManager.refreshToken);
                    window.location = '/register/' + user.accessToken + '/' + user.refreshToken;
                }).catch((error) => {
                    console.error(error.code, error.message);
                });
        });

        facebookButton.addEventListener('click', async () => {
            await signInWithPopup(auth, facebookProvider)
                .then((result) => {
                    const credential = FacebookAuthProvider.credentialFromResult(result);
                    const token = credential.accessToken;
                    const user = result.user;

                    localStorage.setItem('accessToken', user.stsTokenManager.accessToken);
                    localStorage.setItem('refreshToken', user.stsTokenManager.refreshToken);
                    window.location = '/register/' + user.accessToken + '/' + user.refreshToken;
                }).catch((error) => {
                    console.error(error.code, error.message);
                });
        });
    </script>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const form = document.querySelector('form');

        // Buat elemen pesan error
        const passwordError = document.createElement('p');
        const confirmPasswordError = document.createElement('p');

        passwordError.style.color = 'red';
        passwordError.style.fontSize = '0.875rem';
        passwordError.style.marginTop = '0.25rem';

        confirmPasswordError.style.color = 'red';
        confirmPasswordError.style.fontSize = '0.875rem';
        confirmPasswordError.style.marginTop = '0.25rem';

        passwordInput.parentElement.appendChild(passwordError);
        confirmPasswordInput.parentElement.appendChild(confirmPasswordError);

        function validatePasswordRules(password) {
            const minLength = 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[^A-Za-z0-9]/.test(password);

            if (password.length < minLength) {
                return "❌ Minimal 8 karakter.";
            }
            if (!hasUpper) {
                return "❌ Harus ada huruf besar.";
            }
            if (!hasLower) {
                return "❌ Harus ada huruf kecil.";
            }
            if (!hasNumber) {
                return "❌ Harus ada angka.";
            }
            if (!hasSpecial) {
                return "❌ Harus ada karakter spesial.";
            }
            return ""; // Valid
        }

        function validateForm() {
            let isValid = true;

            // Validasi password
            const passwordValidationMsg = validatePasswordRules(passwordInput.value);
            if (passwordValidationMsg !== "") {
                passwordError.textContent = passwordValidationMsg;
                isValid = false;
            } else {
                passwordError.textContent = "";
            }

            // Validasi konfirmasi password
            if (confirmPasswordInput.value !== passwordInput.value) {
                confirmPasswordError.textContent = "❌ Password tidak cocok.";
                isValid = false;
            } else {
                confirmPasswordError.textContent = "";
            }

            return isValid;
        }

        passwordInput.addEventListener('input', validateForm);
        confirmPasswordInput.addEventListener('input', validateForm);

        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault(); // Blok kirim form jika tidak valid
            }
        });
    </script>
@endpush
