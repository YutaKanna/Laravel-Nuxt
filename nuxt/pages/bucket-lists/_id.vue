<template>
  <div>
    <section class="container">
        <form method="post" @submit.prevent="updatete">
          <input type="text" name="title" v-model="bucketList.title" />
          <input type="text" name="description" v-model="bucketList.description" />
          <button type="submit">更新</button>
        </form>

    </section>
  </div>
</template>

<script>
import axios from 'axios';
var axiosPost = axios.create({
  xsrfHeaderName: "X-XSRF-TOKEN",
  withCredentials: true
})
export default {
  layout: 'app',
  data: function () {
    return {
      title: '',
      description: '',
    }
  },
  async asyncData({params}) {
    const { data } = await axios.get(`http://localhost:8000/api/bucket-lists/${params.id}`)
    return { bucketList: data.data.bucketList }
  },
  methods: {
    async updatete() {
      await axiosPost.patch
      (`http://localhost:8000/api/bucket-lists/${this.$route.params.id}`, {
        title: this.bucketList.title,
        description: this.bucketList.description,
        withCredentials: true,
      }).then(this.$router.push('/bucket-lists'));
    },
    async deletete() {
      await axiosPost.delete
      (`http://localhost:8000/api/bucket-lists/${this.$route.params.id}`, {
        data: {
            title: this.title,
            description: this.description
        }
      }).then(this.$router.push('/bucket-lists'));
    }
  }
}
</script>