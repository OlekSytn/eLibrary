<template>

  <div
  @click.prevent="closeMobileMenu"
  class="content-overlay"
  ></div>

</template>

<script>

export default {

   methods: {

    closeMobileMenu() {
      EventBus.$emit('menu/toggle');
    },

  },

};

</script>
