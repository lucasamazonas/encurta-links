<template>
  <input
    v-model="search"
    placeholder="Search or Paste URL"
  />
</template>

<script setup lang="ts">
import {useSearchStore} from "@/store/search";
import {ref, watch} from "vue";

const searchStore = useSearchStore();

const search = ref('')
let delayTimeout = null

watch(search, () => {
  clearTimeout(delayTimeout)
  delayTimeout = setTimeout(() => searchStore.setSearch(search.value), 300)
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
  outline: none;
}
input:focus {
  border: .14rem solid #64B5F6;
}
</style>
