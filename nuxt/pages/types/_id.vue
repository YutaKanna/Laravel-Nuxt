<template>
  <div>
    <section class="container">
        <form method="post" @submit.prevent="onSubmit">
          <input type="text" name="name" v-model="type.name" />
          <button type="submit">更新</button>
        </form>
        <form method="post" @submit.prevent="deletete">
          <button type="submit">削除</button>
        </form>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  layout: 'app',
  data: function () {
    return {
      name: '',
    }
  },
  async asyncData({params}) {
    const typeId = `${params.id}`;
    return {
      type: await detail("types", typeId)
    };
  },
  methods: {
    async onSubmit() {
      const typeId = `${this.$route.params.id}`;
      var db = firebase.firestore()
      db.collection("types").doc(typeId).update({
        name: this.type.name,
      })
    },
    async deletete() {
      const typeId = `${this.$route.params.id}`;
      var db = firebase.firestore()
      db.collection("types").doc(typeId).delete()
    }
  }
}

async function detail(collection, id) {
  const db = firebase.firestore()
  const type = await db
    .collection(collection)
    .doc(id)
    .get()
    .then(doc => doc.data());
    return type
}
</script>