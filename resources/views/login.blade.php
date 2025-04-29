@extends('templateLayout')

@section('title', 'Login Pages')

@section('content')
    <main
        class="bg-gradient-to-br from-gray-100 via-blue-50 to-purple-100 flex items-center justify-center min-h-screen px-5 dark:bg-gradient-to-t dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 transition-colors ease-in-out duration-500">

        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-sm dark:bg-gray-800 dark:text-white">
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800 dark:text-white">Login</h2>

            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Sign In
                </button>
            </form>

            <section class="flex flex-col items-center gap-2 mt-5">
                <section>
                    <p class="text-sm text-slate-600">Or sign in with</p>
                </section>
                <section class="flex items-center gap-10 justify-center">
                    <button id="google-button" class="cursor-pointer"><img width="50px"
                            src="{{ asset('assets/images/loginpages/google.png') }}" alt=""></button>
                    <button id="facebook-button" class="cursor-pointer"><img width="35px"
                            src="{{ asset('assets/images/loginpages/facebook.png') }}" alt=""></button>
                </section>
            </section>


            <p class="text-sm text-center text-gray-500 mt-4">
                Don't have an account?
                <a href="#" class="text-blue-500 hover:underline">Sign up</a>
            </p>
        </div>

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
        const provider = new GoogleAuthProvider();

        const auth = getAuth();


        googleButton.addEventListener('click', async () => {
            await signInWithPopup(auth, provider)
                .then((result) => {
                    // This gives you a Google Access Token. You can use it to access the Google API.
                    const credential = GoogleAuthProvider.credentialFromResult(result);
                    const token = credential.accessToken;
                    // The signed-in user info.
                    const user = result.user;

                    console.log(user.stsTokenManager.accessToken);

                    localStorage.setItem('accessToken', user.stsTokenManager.accessToken);
                    localStorage.setItem('refreshToken', user.stsTokenManager.refreshToken);
                    window.location = '/signin/' + user.accessToken + '/' + user.refreshToken;


                }).catch((error) => {
                    // Handle Errors here.
                    const errorCode = error.code;
                    const errorMessage = error.message;
                    // The email of the user's account used.
                    const email = error.customData.email;
                    // The AuthCredential type that was used.
                    const credential = GoogleAuthProvider.credentialFromError(error);
                    // ...

                    console.log(errorCode)
                    console.log(errorMessage)
                });
        })


        facebookButton.addEventListener('click', () => {

            const auth = getAuth();
            signInWithPopup(auth, provider)
                .then((result) => {
                    // The signed-in user info.
                    const user = result.user;

                    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
                    const credential = FacebookAuthProvider.credentialFromResult(result);
                    const accessToken = credential.accessToken;

                    // IdP data available using getAdditionalUserInfo(result)
                    // ...
                })
                .catch((error) => {
                    // Handle Errors here.
                    const errorCode = error.code;
                    const errorMessage = error.message;
                    // The email of the user's account used.
                    const email = error.customData.email;
                    // The AuthCredential type that was used.
                    const credential = FacebookAuthProvider.credentialFromError(error);

                    // ...
                });
        })
    </script>
@endpush
