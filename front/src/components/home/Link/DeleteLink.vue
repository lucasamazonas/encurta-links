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
        :disabled="loadingActive"
        @close="dialogActive = ! dialogActive"
      />

      <v-card-text class="pt-0">
        <span class="text-caption">
          {{ props.id ? 'Do you really want to delete this link?' : 'Do you really want to delete all links?' }}
        </span>
      </v-card-text>

      <v-card-actions class="justify-end px-4 mt-n4">
        <v-btn
          class="text-none"
          variant="text"
          color="red"
          :loading="loadingActive"
          @click="deleteLink"
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
import {useHttp} from "@/plugins/http";
import {useLinksStore} from "@/store/links";

const {http} = useHttp()
const linksStore = useLinksStore()

interface Props {
  id?: string
}

const props = defineProps<Props>()

const dialogActive = ref(false)
const loadingActive = ref(false)

function deleteLink() {
  loadingActive.value = true

  http.delete(`links/${props.id || ''}`)
    .then(() => {
      linksStore.executeCallbackUpdateListLinks()
      close()
    })
    .catch(() => {
      alert('error deleting link')
      close()
    })
}

function close() {
  dialogActive.value = false
  loadingActive.value = false
}
</script>
