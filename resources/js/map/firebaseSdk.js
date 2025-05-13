// Import the functions you need from the SDKs you need

import { initializeApp } from "firebase/app";

const firebaseConfig = {
    apiKey: "AIzaSyC9xdU9qSHCYaiSn6e7Y5y5K_uTMc0osw8",

    authDomain: "projectapmo.firebaseapp.com",

    databaseURL:
        "https://projectapmo-default-rtdb.asia-southeast1.firebasedatabase.app/",

    projectId: "projectapmo",

    storageBucket: "projectapmo.firebasestorage.app",

    messagingSenderId: "189628012384",

    appId: "1:189628012384:web:df6fb50043963d1350b005",

    measurementId: "G-2YQB3BDTBR",
};

export const app = initializeApp(firebaseConfig);
