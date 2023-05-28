/// <reference types="vite/client" />

declare module '*.vue' {
  import type { DefineComponent } from 'vue'
  const component: DefineComponent<{}, {}, any>
  export default component
}

interface Link {
  id: string,
  url: string,
  name: string,
  alias: string,
  clicks: number
}

interface NewLink {
  id?: string,
  url: string,
  name: string
}

interface UpdateLink {
  id: string,
  url: string,
  name: string
}

interface Stat {
  icon: string,
  value: number,
  text: string,
  sufix?: string
}
