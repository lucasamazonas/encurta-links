import {computed} from 'vue'
import {useSearchStore} from '@/store/search'
import {useLinksStore} from '@/store/links'

const linksStore = useLinksStore()
const searchStore = useSearchStore();

export function useLinksSearch() {
  const linksSearch = computed(() => {
    const search = searchStore.search.trim()

    if (search.length === 0) return linksStore.items

    const callback = (item: Link) => JSON.stringify(item).toLowerCase()
      .includes(search.toLowerCase())
    return linksStore.items.filter(callback)
  })

  return { linksSearch }
}
