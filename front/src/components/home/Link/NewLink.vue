<template>
  <v-dialog v-model="dialogActive" content-class="bra-20">
    <template #activator>
      <slot name="activator" :callback="() => dialogActive = ! dialogActive">
        <v-btn color="#afafaf" icon @click="dialogActive = ! dialogActive">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
      </slot>
    </template>

    <v-card class="rounded-xl">
      <TitleDialog
        title="New Link"
        :disabled="loadingActive"
        @close="close"
      />

      <v-card-text>
        <v-text-field
          v-model="newLink.id"
          label="Unique Identifier"
          variant="outlined"
          color="primary"
          clearable
          :disabled="loadingActive"
        />

        <v-text-field
          v-model="newLink.url"
          label="URL"
          variant="outlined"
          color="primary"
          clearable
          class="mt-2"
          :disabled="loadingActive"
          :error-messages="getErrorsMenssages('url')"
        />
      </v-card-text>

      <v-card-actions class="justify-end px-4 mt-n4">
        <v-btn
          class="text-none"
          variant="text"
          color="primary"
          :loading="loadingActive"
          @click="save"
        >
          Salvar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup lang="ts">
import {ref, watch} from "vue";
import TitleDialog from "@/components/utils/TitleDialog.vue";
import { useVuelidate } from '@vuelidate/core'
import { required, url } from '@vuelidate/validators'

interface Link {
  id: string,
  url: string,
}

interface Props {
  linkEdit?: Link
}

const props = defineProps<Props>()

const dialogActive = ref(false)
const loadingActive = ref(false)

const newLink = ref<Link>({
  id: '',
  url: '',
})

watch(dialogActive, () => {
  if (props.linkEdit === undefined) return;
  newLink.value = { ...props.linkEdit }
})

const rules = {
  url: { required, url }
}
const $v = useVuelidate(rules, newLink)

function close() {
  dialogActive.value = ! dialogActive.value;
  $v.value.$reset();
  newLink.value = {
    id: '',
    url: ''
  }
}

function getErrorsMenssages(key: 'id' | 'url'): string {
  if (!$v.value[key].$dirty) return ''

  if ($v.value[key].required.$invalid) return $v.value[key].required.$message
  if (key === 'url' && $v.value[key].url.$invalid) return $v.value[key].url.$message

  return '';
}

function save() {
  $v.value.$touch();

  if ($v.value.$invalid) return;

  const params = {
    ...newLink.value,
    id: props.linkEdit?.id
  }
  console.log('ok')
}
</script>
