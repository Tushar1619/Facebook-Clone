<template>
  <div class="flex flex-col items-center py-4">
    <NewPost />
    <Post v-for="post in posts.data" :key="post.data.post_id" :post="post"/>
  </div>
</template>

<script setup>
import axios from "axios";
import NewPost from "../components/NewPost.vue";
import Post from "../components/Post.vue";
import { onMounted, ref } from "vue";

  const posts = ref([]);
  onMounted(()=>{
      axios.get("/api/posts")
      .then((res) => {
          posts.value = res.data;
        // this.loading = false;
      })
      .catch((error) => {
        console.error("Error fetching posts:", error);
        // this.loading = false;
      });
  });
</script>

<style scoped>
</style>
