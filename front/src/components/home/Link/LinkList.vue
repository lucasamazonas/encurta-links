<template>
  <div>
    <template v-if="linksSearch.length > 0">
      <ItemLinkList
        v-for="link in linksSearch"
        :key="link.id"
        :link="link"
        class="mb-4"
      />
    </template>

    <div v-else-if="loadingActive" class="text-center mt-10">
      <v-progress-linear color="primary" :size="45" />
      <p class="text-caption text-grey-darken-1 mt-2">Loading... please wait</p>
    </div>

    <span v-else class="text-grey-lighten-1 text-subtitle-1">No link found</span>
  </div>
</template>

<script setup lang="ts">
import ItemLinkList from '@/components/home/Link/ItemLinkList.vue'
import {onMounted, ref} from "vue";
import {useHttp} from '@/plugins/http'
import {useLinksStore} from '@/store/links'
import {useLinksSearch} from '@/components/home/Link/LinksSearch'

const {http} = useHttp()
const linksStore = useLinksStore()
const {linksSearch} = useLinksSearch()

const loadingActive = ref(false)

onMounted(getLinksApi)
linksStore.setCallback(getLinksApi)

function getLinksApi() {
  http.get('links')
    .then(resp => {
      linksStore.setItems(resp.data)
      loadingActive.value = false
    })
    .catch(() => alert('error when fetching links'))
}
</script>
