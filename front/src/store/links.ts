import { defineStore } from 'pinia'
import {computed, ref} from "vue";

export const useLinksStore = defineStore('links', () => {
  const items = ref<Link[]>([])
  let callbackUpdateListLinks: Function | null

  const totalClicks = computed(() => {
    return items.value.reduce((a, b) => a + b.clicks, 0)
  })

  function setItems(links: Link[]) {
    items.value = links
  }

  function setCallback(fn: Function) {
    callbackUpdateListLinks = fn
  }

  function executeCallbackUpdateListLinks() {
    if (!callbackUpdateListLinks) return;
    callbackUpdateListLinks()
  }

  return {
    items,
    setItems,
    setCallback,
    executeCallbackUpdateListLinks,
    totalClicks
  }
})
