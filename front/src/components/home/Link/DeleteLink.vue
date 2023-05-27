<template>
  <v-dialog v-model="dialogActive" :width="350">
    <template #activator>
      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-n3"
        @click="dialogActive = ! dialogActive"
      >
        <v-icon :size="20">mdi-trash-can-outline</v-icon>
      </v-btn>
    </template>

    <v-card class="rounded-xl">
      <TitleDialog
        title="Delete"
        icon="mdi-delete"
        @close="dialogActive = ! dialogActive"
      />

      <v-card-text class="pt-0">
        <span class="text-caption">Do you really want to delete this link?</span>
      </v-card-text>

      <v-card-actions class="justify-end px-4 mt-n4">
        <v-btn
          class="text-none"
          variant="text"
          color="red"
          :loading="loadingActive"
          @click="save"
        >
          YES
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import {ref} from "vue";
import TitleDialog from "@/components/utils/TitleDialog.vue";

interface Props {
  id?: string
}

const props = defineProps<Props>()

const dialogActive = ref(false)
</script>
