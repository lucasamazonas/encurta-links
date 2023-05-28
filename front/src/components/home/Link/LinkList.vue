<template>
  <div>
    <template v-if="linksStore.items.length > 0">
      <ItemLinkList
        v-for="link in linksView"
        :key="link.id"
        :link="link"
        class="mb-4"
        @link-delete="getLinks"
      />
    </template>

    <div v-else-if="loadingActive" class="text-center mt-10">
      <v-progress-linear color="primary" :size="45" />
      <p class="text-caption text-grey-darken-1 mt-2">Loading... please wait</p>
    </div>

    <span v-else class="text-grey-lighten-1 text-subtitle-1">No registered link</span>
  </div>
</template>

<script setup lang="ts">
import ItemLinkList from '@/components/home/Link/ItemLinkList.vue'
import {computed, onMounted, ref} from "vue";
import {useHttp} from "@/plugins/http";
import {useLinksStore} from "@/store/links";
import {useSearchStore} from "@/store/search";

const {http} = useHttp()
const linksStore = useLinksStore()
const searchStore = useSearchStore();

const loadingActive = ref(false)

const linksView = computed(() => {
  const search = searchStore.search.trim()

  if (search.length === 0) return linksStore.items

  const callback = item => JSON.stringify(item).toLowerCase()
    .includes(search.toLowerCase())
  return linksStore.items.filter(callback)
})

onMounted(getLinks)
linksStore.setCallback(getLinks)

function getLinks() {
  http.get('links')
    .then(resp => {
      linksStore.setItems(resp.data)
      loadingActive.value = false
    })
    .catch(() => console.log('erro'))
}
</script>
