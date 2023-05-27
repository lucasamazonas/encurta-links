<template>
  <v-card-title class="d-flex align-center pt-3 pb-1">
    <v-icon
      v-if="props.icon !== undefined"
      color="grey-darken-1"
      :size="25"
    >
      {{ props.icon }}
    </v-icon>

    <span
      class="text-h6 pl-2"
      v-text="props.title"
    />

    <v-spacer />

    <v-btn
      icon="mdi-close"
      variant="text"
      :disabled="props.disabled"
      @click="ev => emit('close', ev)"
    />
  </v-card-title>
</template>

<script setup lang="ts">
interface Props {
  title: string,
  disabled?: boolean,
  icon?: string
}

const props = defineProps<Props>()
const emit = defineEmits(['close'])
</script>

<style scoped>

</style>
