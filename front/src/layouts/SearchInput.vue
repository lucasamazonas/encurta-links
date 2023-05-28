<template>
  <input
    v-model="search"
    placeholder="Search or Paste URL"
    class=""
  />
</template>

<script setup lang="ts">
import {useSearchStore} from "@/store/search";
import {computed} from "vue";

const searchStore = useSearchStore();

const search = computed({
  get: () => searchStore.search,
  set: (value: string) => searchStore.setSearch(value)
})
</script>

<style scoped>
input {
  width: 100%;
  background: #f3f2f2;
  padding: 10px 10px;
  border-radius: 4px;
  text-align: center;
  font-size: .9rem;
}
</style>
