<template>
  <div>
    <section class="container">
        <ul v-for="(type, key) in types">
            <li>{{type.name}} [{{key}}]</li>
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  layout: 'app',
  async asyncData({ params }) {
    return {
      types: await getAllDocs("types")
    };
  }
}

async function getAllDocs(collection) {
  let obj = [];
  const db = firebase.firestore()
  let colRef = db.collection(collection);
  const allSnapShot = await colRef.get();
  allSnapShot.forEach(doc => {
      obj.push(doc.data());
  });
  return obj;
}
</script>