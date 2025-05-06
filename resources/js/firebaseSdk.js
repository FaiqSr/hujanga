import { initializeApp } from "firebase/app";

const firebaseConfig = {
    apiKey: "AIzaSyCWj-q9H9eIbh8u642FcPgJJGZ6AmnNeMw",
    authDomain: "projectapmo5.firebaseapp.com",
    databaseURL:
        "https://projectapmo5-default-rtdb.asia-southeast1.firebasedatabase.app/",
    projectId: "projectapmo5",
    storageBucket: "projectapmo5.firebasestorage.app",
    messagingSenderId: "276690538161",
    appId: "1:276690538161:web:7cd4847d9c0eab4e71dc90",
    measurementId: "G-YF5YDTK0P6",
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
