<template>
  <div>
    <div class="d-flex align-center">
      <span class="text-body-2 font-weight-medium text-grey-darken-2">STATS</span>

      <v-spacer />

      <span class="text-body-2 font-weight-medium text-grey-lighten-1">See all</span>
    </div>

    <div class="d-flex align-center justify-space-between">
      <Stat
        v-for="(stat, key) in stats"
        :key="key"
        :stat="stat"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import Stat from "@/components/home/Stat.vue";

const stats = ref([
  {
    icon: 'mdi-link-variant',
    value: 0,
    text: 'Links'
  },
  {
    icon: 'mdi-eye-outline',
    value: 0,
    text: 'Views'
  },
  {
    icon: 'mdi-cursor-default-click-outline',
    value: 0,
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
])
</script>

<style scoped>

</style>
