<template>
  <form method="post" @submit.prevent="onSubmit">
    <input type="text" name="name" v-model="name" />
    <button type="submit">submit</button>
  </form>
</template>


<script>
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  data() {
    return {
      name: ''
    }
  },
  methods: {
    onSubmit() {
      console.log("hoge");
      var docData = {
        name: this.name
      };
      var db = firebase.firestore()
      db.collection('types').add(docData)
    }
  }
}
</script>