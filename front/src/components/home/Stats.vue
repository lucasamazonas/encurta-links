<template>
  <div>
    <div class="d-flex align-center">
      <span class="text-body-2 font-weight-medium text-grey-darken-2">STATS</span>

      <v-spacer />

      <span class="text-body-2 font-weight-medium text-grey-lighten-1">See all</span>
    </div>

    <div class="d-flex align-center justify-space-between">
      <ItemStat
        v-for="(stat, key) in stats"
        :key="key"
        :stat="stat"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import ItemStat from '@/components/home/Stat.vue'
import {useLinksStore} from '@/store/links'
import {computed} from "vue";
import {useLinksSearch} from "@/components/home/Link/LinksSearch";

const linksStore = useLinksStore()
const {linksSearch} = useLinksSearch()

const stats = computed((): Stat[] => ([
  {
    icon: 'mdi-link-variant',
    value: linksSearch.value.length,
    text: 'Links'
  },
  {
    icon: 'mdi-eye-outline',
    value: 0,
    text: 'Views'
  },
  {
    icon: 'mdi-cursor-default-click-outline',
    value: linksStore.totalClicks,
    text: 'Clicks'
  },
  {
    icon: 'mdi-chart-line-variant',
    value: 0,
    text: 'Avg. CTR',
    sufix: '%'
  },
  {
    icon: 'mdi-clock-outline',
    value: 0,
    text: 'Avg Time',
    sufix: 's'
  }
]))
</script>

<style scoped>

</style>
