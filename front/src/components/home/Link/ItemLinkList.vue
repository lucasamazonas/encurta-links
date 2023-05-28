<template>
  <div class="d-flex align-center pa-5 bg-white rounded">
    <v-icon color="grey-darken-1">mdi-dots-vertical</v-icon>

    <div class="w-100 px-3">
      <p class="font-weight-medium text-subtitle-1">{{ props.link.name }}</p>
      <a
        class="font-weight-medium text-caption text-blue mt-n1 text-decoration-none"
        :href="props.link.alias"
        target="_blank"
        v-text="props.link.alias"
        @click="clickLink"
      />
    </div>

    <div class="d-flex align-center">
      <div class="d-flex align-center text-blue-grey-lighten-2">
        <span class="text-caption mt-1 mr-1">{{ props.link.clicks }}</span>
        <v-icon :size="13">mdi-poll</v-icon>
        <v-icon :size="13" class="ml-n2px">mdi-poll</v-icon>
      </div>

      <CopyValue :value="props.link.alias">
        <template #default="{ copy }">
          <v-btn
            icon
            variant="text"
            color="grey-darken-1"
            class="ml-3"
            @click="copy"
          >
            <v-icon :size="20">mdi-content-copy</v-icon>
          </v-btn>
        </template>
      </CopyValue>

      <NewLink :link-edit="link">
        <template #activator="{ callback }">
          <v-btn
            icon
            variant="text"
            color="grey-darken-1"
            class="ml-n3"
            @click="callback"
          >
            <v-icon :size="20">mdi-square-edit-outline</v-icon>
          </v-btn>
        </template>
      </NewLink>

      <DeleteLink :id="link.id" @link-delete="ev => $emit('link-delete', ev)" />
    </div>
  </div>
</template>

<script setup lang="ts">
import NewLink from "@/components/home/Link/NewLink.vue";
import CopyValue from "@/components/utils/CopyValue.vue";
import DeleteLink from "@/components/home/Link/DeleteLink.vue";
import {useLinksStore} from "@/store/links";

const linksStore = useLinksStore()

interface Props {
  link: Link
}

const props = defineProps<Props>()
defineEmits(['link-delete'])

function clickLink() {
  setTimeout(linksStore.executeCallbackUpdateListLinks, 500)
}
</script>

<style scoped>

</style>
