<template>
  <div>
    <ItemLinkList
      v-for="link in links"
      :key="link.id"
      :link="link"
      class="mb-4"
    />
  </div>
</template>

<script setup lang="ts">
import ItemLinkList from '@/components/home/Link/ItemLinkList.vue'
import {ref} from "vue";

const links = ref([
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 'aaa-aaa',
    url: 'https://www.google.com.br',
    alias: 'www.x.x'
  },
])
</script>
