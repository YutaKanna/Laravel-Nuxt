import firebase from "firebase/app"

if (!firebase.apps.length) {
  firebase.initializeApp({
    apiKey: "AIzaSyDenvSEDppZdfRtplG7pBG9GlC6mtVsxl0",
    authDomain: "laravel-nuxt-5824c.firebaseapp.com",
    databaseURL: "https://laravel-nuxt-5824c.firebaseio.com",
    projectId: "laravel-nuxt-5824c",
    storageBucket: "laravel-nuxt-5824c.appspot.com",
    messagingSenderId: "999904261975",
  })
}

export default firebase