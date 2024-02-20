<template>
  <div class="flex flex-col items-center py-4">
    <NewPost />

    <p v-if="loading">Loading...</p>
    <Post
      v-else
      v-for="post in posts.data"
      :key="post.data.post_id"
      :post="post"
    />
  </div>
</template>

<script setup>
import axios from "axios";
import NewPost from "../components/NewPost.vue";
import Post from "../components/Post.vue";
import { onMounted, ref } from "vue";

const posts = ref([]);
const loading = ref(true);
onMounted(() => {
  axios
    .get("/api/posts")
    .then((res) => {
      posts.value = res.data;
      loading.value = false;
    })
    .catch((error) => {
      console.error("Error fetching posts:", error);
      loading.value = false;
    });
});
</script>

<style scoped>
</style>
