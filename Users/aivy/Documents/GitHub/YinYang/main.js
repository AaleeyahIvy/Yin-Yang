// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyC8pbfAmEmaBFoohuHE1lMXi-KQyhrpqXI",
  authDomain: "yinyang-33041.firebaseapp.com",
  projectId: "yinyang-33041",
  storageBucket: "yinyang-33041.appspot.com",
  messagingSenderId: "1066794609552",
  appId: "1:1066794609552:web:5c0157ed7d32ed273a2115",
  measurementId: "G-FMBHFQDCKC"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);