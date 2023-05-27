<template>
  <v-dialog v-model="dialogActive" content-class="bra-20">
    <template #activator>
      <v-btn color="#afafaf" icon @click="dialogActive = ! dialogActive">
        <v-icon>mdi-plus</v-icon>
      </v-btn>
    </template>

    <v-card class="rounded-xl">
      <TitleDialog title="New Link" />

      <v-card-text>
        oi
      </v-card-text>

      <v-card-actions class="justify-end px-4">
        <v-btn class="text-none" variant="text" color="primary">
          Salvar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import {ref} from "vue";
import TitleDialog from "@/components/utils/TitleDialog.vue";

const dialogActive = ref(!false)
</script>
