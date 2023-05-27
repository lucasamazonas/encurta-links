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
import ItemLinkList from '@/components/home/ItemLinkList.vue'
import {ref} from "vue";

const links = ref([
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  },
  {
    id: 0,
    name: 'Link do google',
    value: 'www.google.com.br',
    alias: 'www.x.x'
  }
])
</script>
