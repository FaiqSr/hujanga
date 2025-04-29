// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCWj-q9H9eIbh8u642FcPgJJGZ6AmnNeMw",
  authDomain: "projectapmo5.firebaseapp.com",
  projectId: "projectapmo5",
  storageBucket: "projectapmo5.firebasestorage.app",
  messagingSenderId: "276690538161",
  appId: "1:276690538161:web:7cd4847d9c0eab4e71dc90",
  measurementId: "G-YF5YDTK0P6"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

