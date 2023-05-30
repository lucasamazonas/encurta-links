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
          :disabled="loadingActive || !!props.linkEdit"
          @keyup.enter="save"
        />

        <v-text-field
          v-model="newLink.name"
          label="Name"
          variant="outlined"
          color="primary"
          clearable
          :disabled="loadingActive"
          :error-messages="getErrorsMessages('name')"
          @keyup.enter="save"
        />

        <v-text-field
          v-model="newLink.url"
          label="URL"
          variant="outlined"
          color="primary"
          clearable
          class="mt-2"
          :disabled="loadingActive"
          :error-messages="getErrorsMessages('url')"
          @keyup.enter="save"
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
import {maxLength, required, url} from '@vuelidate/validators'
import {useHttp} from '@/plugins/http'
import {useLinksStore} from "@/store/links";

const {http} = useHttp()
const linksStore = useLinksStore()

interface Props {
  linkEdit?: Link
}

const props = defineProps<Props>()

const dialogActive = ref(false)
const loadingActive = ref(false)

const newLink = ref<NewLink>({
  id: '',
  name: '',
  url: ''
})

watch(dialogActive, () => {
  if (props.linkEdit === undefined) return;
  const { id, name, url } = props.linkEdit;
  newLink.value = { id, name, url }
})

const rules = {
  name: {
    required,
    maxLength: maxLength(60)
  },
  url: {
    required,
    url,
    maxLength: maxLength(60)
  }
}
const $v = useVuelidate(rules, newLink)

function close() {
  dialogActive.value = ! dialogActive.value;
  $v.value.$reset();
  newLink.value = {
    id: '',
    name: '',
    url: '',
  }
}

function getErrorsMessages(key: 'name' | 'url'): string {
  if (!$v.value[key].$dirty || $v.value[key].$errors.length === 0) return ''
  const [firstError] = $v.value[key].$errors
  return String(firstError.$message)
}

function save() {
  $v.value.$touch();
  if ($v.value.$invalid) return;

  loadingActive.value = true

  if (!props.linkEdit?.id) {
    create(newLink.value)
    return
  }

  const params: UpdateLink = {
    ...newLink.value,
    id: props.linkEdit.id
  }
  update(params)
}

function create(newLink: NewLink) {
  http.post('links', newLink)
    .then(savedSuccessfully)
    .catch(() => {
      alert('error creating link')
      close()
    })
}

function update(link: UpdateLink) {
  http.put(`links/${link.id}`, link)
    .then(savedSuccessfully)
    .catch(() => {
      alert('error updating link')
      close()
    })
}

function savedSuccessfully() {
  close()
  loadingActive.value = false
  linksStore.executeCallbackUpdateListLinks()
}
</script>
