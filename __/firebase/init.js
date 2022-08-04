import { initializeApp } from "firebase/app";
import { getDatabase } from "firebase/database";
import { getAuth } from "firebase/auth";
import { getAuth, onAuthStateChanged, createUserWithEmailAndPassword, EmailAuthProvider} from "firebase/auth";
import { getDatabase } from "firebase/database";    

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

  // Initialize All
  const auth = getAuth(app);
  const app = initializeApp(firebaseConfig);
  const database = getDatabase(app);
  
  initApp = function() {
    firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        // User is signed in.
        var displayName = user.displayName;
        var email = user.email;
        var emailVerified = user.emailVerified;
        var photoURL = user.photoURL;
        var uid = user.uid;
        var phoneNumber = user.phoneNumber;
        var providerData = user.providerData;
        user.getIdToken().then(function(accessToken) {
          document.getElementById('sign-in-status').textContent = 'Signed in';
          document.getElementById('sign-in').textContent = 'Sign out';
          document.getElementById('account-details').textContent = JSON.stringify({
            displayName: displayName,
            email: email,
            emailVerified: emailVerified,
            phoneNumber: phoneNumber,
            photoURL: photoURL,
            uid: uid,
            accessToken: accessToken,
            providerData: providerData
          }, null, '  ');
        });
      } else {
        // User is signed out.
        document.getElementById('sign-in-status').textContent = 'Signed out';
        document.getElementById('sign-in').textContent = 'Sign in';
        document.getElementById('account-details').textContent = 'null';
      }
    }, function(error) {
      console.log(error);
    });
  };

  window.addEventListener('load', function() {
    initApp()
  });
  var firebase = require('firebase');
  var firebaseui = require('firebaseui');
  var ui = new firebaseui.auth.AuthUI(firebase.auth());
  const credential = EmailAuthProvider.credential(email, password);


  /**
   * Handles the sign in button press.
   */
   function writeUserData(userId, fullname, email) {
const db = getDatabase();
set(ref(db, 'users/' + userId), {
  username: fullname,
  email: email
});
document.getElementById('submit').addEventListener('click', writeUserData);
}
  function toggleSignIn() {
    const auth = getAuth();
    const user = auth.currentUser;
    if (firebase.auth().currentUser) {
      firebase.auth().signOut();
    } else {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      if (email.length < 4) {
        alert('Please enter an email address.');
        return;
      }
      if (password.length < 4) {
        alert('Please enter a password.');
        return;
      }
      // Sign in with email and pass.
      firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        if (errorCode === 'auth/wrong-password') {
          alert('Wrong password.');
        } else {
          alert(errorMessage);
        }
        console.log(error);
        document.getElementById('sign-in').disabled = false;
      });
    }
    document.getElementById('sign-in').disabled = true;
  }

  /**
   * Handles the sign up button press.
   */
  function handleSignUp() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (email.length < 4) {
      alert('Please enter an email address.');
      return;
    }
    if (password.length < 4) {
      alert('Please enter a password.');
      return;
    }
    // Create user with email and pass.
    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      if (errorCode == 'auth/weak-password') {
        alert('The password is too weak.');
      } else {
        alert(errorMessage);
      }
      console.log(error);
    });
  }

  /**
   * Sends an email verification to the user.
   */
  function sendEmailVerification() {
    const auth = getAuth();
    const user = auth.currentUser;
    firebase.auth().currentUser.sendEmailVerification().then(function() {
      // Email Verification sent!
      alert('Email Verification Sent!');
    });
  }

  function sendPasswordReset() {
    var email = document.getElementById('email').value;
    firebase.auth().sendPasswordResetEmail(email).then(function() {
      // Password Reset Email Sent!
      alert('Password Reset Email Sent!');
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      if (errorCode == 'auth/invalid-email') {
        alert(errorMessage);
      } else if (errorCode == 'auth/user-not-found') {
        alert(errorMessage);
      }
      console.log(error);
    });
  }

  /**
   * initApp handles setting up UI event listeners and registering Firebase auth listeners:
   *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
   *    out, and that is where we update the UI.
   */
  function initApp() {
    // Listening for auth state changes.
    firebase.auth().onAuthStateChanged(function(user) {
      const auth = getAuth();
      const user = auth.currentUser;
      document.getElementById('quickstart-verify-email').disabled = true;
      if (user) {
        // User is signed in.
        var email = user.email;
        var password = user.password;
        document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
        document.getElementById('sign-in').textContent = 'Sign out';
        document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
        if (!emailVerified) {
          document.getElementById('quickstart-verify-email').disabled = false;
        }
      } else {
        // User is signed out.
        document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
        document.getElementById('sign-in').textContent = 'Sign in';
        document.getElementById('quickstart-account-details').textContent = 'null';
      }
      document.getElementById('quickstart-sign-in').disabled = false;
    });

    document.getElementById('sign-in').addEventListener('click', toggleSignIn, false);
    document.getElementById('sign-up').addEventListener('click', handleSignUp, false);
    document.getElementById('quickstart-verify-email').addEventListener('click', sendEmailVerification, false);
    document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);
    document.getElementById('submit').addEventListener('click', writeUserData);
  }

  window.onload = function() {
    initApp();
  };