<template>
  <div class="d-flex">
    <v-icon class="text-grey-lighten-1 mt-1" :size="20">
      {{ props.stat.icon }}
    </v-icon>

    <div class="ml-4">
      <p class="text-h5 font-weight-bold">{{ `${props.stat.value}${props.stat.sufix || ''}` }}</p>
      <p class="text-caption text-grey-darken-1">{{ props.stat.text }}</p>
    </div>
  </div>
</template>

<script setup lang="ts">
interface Props {
  stat: Stat
}

const props = defineProps<Props>()
</script>

<style scoped>

</style>
