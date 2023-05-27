<template>
  <v-card-title class="d-flex align-center pt-3 pb-1">
    <span
      class="text-h6"
      v-text="props.title"
    />

    <v-spacer />

    <v-btn
      icon="mdi-close"
      variant="text"
      @click="ev => emit('close', ev)"
    />
  </v-card-title>
</template>

<script setup lang="ts">
interface Props {
  title: string,
}

const props = defineProps<Props>()
const emit = defineEmits(['close'])
</script>

<style scoped>

</style>
