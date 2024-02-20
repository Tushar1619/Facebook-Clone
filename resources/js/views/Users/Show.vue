<template>
  <div class="w-full flex flex-col items-center">
    <div class="w-full relative mb-8">
      <div class="w-full h-64 overflow-hidden bg-green-500">
        <img
          src="https://c0.wallpaperflare.com/preview/542/56/997/orange-black-and-green-mechanical-keyboard.jpg"
          alt="user background image"
          class="object-cover w-full h-full"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import Post from "../../components/Post.vue";

import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
const user = ref([]);
const loading = ref(true);
const route = useRoute();
onMounted(() => {
  axios
    .get("/api/users/" +route.params.userId)
    .then((res) => {
        user.value = res.data;
      loading.value = false;
    })
    .catch((err) => {
        console.log('Enable to fetch the user from the server',err);
      loading.value = false;
    });
});
</script>

<style></style>