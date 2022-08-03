import { initializeApp } from "firebase/app";
import { getDatabase } from "firebase/database";
import { getAuth } from "firebase/auth";
import firebaseui from "firebaseui";


// TODO: Replace the following with your app's Firebase project configuration
var firebaseConfig = {
    apiKey: "AIzaSyC8pbfAmEmaBFoohuHE1lMXi-KQyhrpqXI",
  authDomain: "yinyang-33041.firebaseapp.com",
  projectId: "yinyang-33041",
  storageBucket: "yinyang-33041.appspot.com",
  messagingSenderId: "1066794609552",
  appId: "1:1066794609552:web:5c0157ed7d32ed273a2115",
  measurementId: "G-FMBHFQDCKC",
  databaseURL: "https://yinyang-33041-default-rtdb.firebaseio.com/"
  };
  const database = getDatabase(app);
  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  // Initialize Firebase
  firebaseui.initializeApp(firebaseConfig);