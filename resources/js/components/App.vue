<template>
  <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
    <Nav />
    <div class="flex overflow-y-hidden flex-1">
      <Sidebar />

      <div class="overflow-x-hidden w-2/3">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, computed, watch } from "vue";
import { useStore } from "vuex";
import Nav from "./Nav.vue";
import Sidebar from "./Sidebar.vue";
import { useRoute, useRouter } from "vue-router";

const store = useStore();
const router = useRouter();
onMounted(() => {
  store.dispatch("fetchAuthUser");
  store.dispatch("setPageTitle", router.currentRoute.value.meta.title);
});

watch(
  () => router.currentRoute.value.meta.title,
  (newTitle) => {
    store.dispatch("setPageTitle", newTitle);
  }
);
</script>


<!-- watch(
  () => route.currentRoute.value.meta.title, // Watch the currentRoute value of the router
  (newTitle) => {
    store.dispatch('setPageTitle', newTitle);
  }
); -->