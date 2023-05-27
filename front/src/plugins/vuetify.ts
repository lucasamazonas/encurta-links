/**
 * plugins/vuetify.ts
 *
 * Framework documentation: https://vuetifyjs.com`
 */

// Styles
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

// Composables
import { createVuetify } from 'vuetify'

// https://vuetifyjs.com/en/introduction/why-vuetify/#feature-guides
export default createVuetify({
  theme: {
    themes: {
      light: {
        colors: {
          primary: '#64B5F6',
          secondary: '#90CAF9',
          background: '#f6f6f6'
        },
      },
    },
  },
  defaults: {
    VDialog: {
      width: 500,
      transition: 'dialog-top-transition',
    }
  }
})
