<template>
  <div class="d-flex align-center">
    <div>
      <v-btn
        class="text-none font-weight-regular text-body-2 bg-grey-lighten-3"
        variant="text"
        color="primary"
        :width="85"
        :height="35"
      >
        <v-icon class="mr-1" :size="22">mdi-home-outline</v-icon>
        Home
      </v-btn>

      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-3"
      >
        <IconBarChart />
      </v-btn>

      <v-btn
        icon
        variant="text"
        color="grey-darken-1"
        class="ml-3"
      >
        <v-icon :size="20">mdi-trash-can-outline</v-icon>
      </v-btn>
    </div>

    <v-spacer />

    <div>
      <v-btn
        icon="mdi-swap-horizontal"
        variant="text"
        color="grey-darken-1"
        class="mr-3 rotate-90deg"
      />
    </div>

    <v-btn
      class="text-none font-weight-regular text-body-2 bg-grey-lighten-3"
      variant="text"
      color="grey-darken-1"
      :width="85"
      :height="35"
    >
      <v-icon class="mr-1" :size="22">mdi-filter-variant</v-icon>
      Filters
    </v-btn>
  </div>
</template>

<script setup lang="ts">
import IconBarChart from '@/components/icons/BarChart.vue'
</script>
