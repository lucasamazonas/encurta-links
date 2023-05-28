<template>
  <slot :copy="copy" />
</template>

<script setup lang="ts">
interface Props {
  value: string
}

const props = defineProps<Props>()

function copy() {
  navigator.clipboard.writeText(props.value + '')
    .catch(() => alert('Text cannot be copied.'));
}
</script>
