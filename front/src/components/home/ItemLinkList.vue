<template>
  <div class="d-flex align-center pa-5 bg-white rounded">
    <div>
      <v-icon color="grey-darken-1">mdi-dots-vertical</v-icon>
    </div>

    <div class="w-100 px-3">
      <p class="font-weight-medium text-subtitle-1">{{ props.link.name }}</p>
      <p class="font-weight-medium text-caption text-blue mt-n1">{{ props.link.value }}</p>
    </div>

    <div class="d-flex align-center">
      <div class="d-flex align-center text-blue-grey-lighten-2">
        <span class="text-caption mt-1 mr-1">0</span>
        <v-icon :size="13">mdi-poll</v-icon>
        <v-icon :size="13" class="ml-n2px">mdi-poll</v-icon>
      </div>

      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-3"
      >
        <v-icon :size="20">mdi-content-copy</v-icon>
      </v-btn>

      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-n3"
      >
        <v-icon :size="20">mdi-square-edit-outline</v-icon>
      </v-btn>

      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-n3"
      >
        <v-icon :size="20">mdi-trash-can-outline</v-icon>
      </v-btn>
    </div>
  </div>
</template>

<script setup lang="ts">
interface Props {
  link: {
    id: number,
    name: string,
    value: string,
    alias: string,
  }
}

const props = defineProps<Props>()
</script>

<style scoped>

</style>
