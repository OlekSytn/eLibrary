<template>

  <div id="wrapper" :class="wrapperClass">

    <MenuToggleBtn></MenuToggleBtn>

    <sidebar></sidebar>

    <ContentOverlay></ContentOverlay>

    <router-view></router-view>

  </div>

</template>

<script>
// @ is an alias to /src
import MenuToggleBtn from './menu/MenuToggleBtn.vue'
import sidebar from './Sidebar.vue'
import ContentOverlay from './menu/ContentOverlay.vue'

export default {

  components: {
    MenuToggleBtn,
    sidebar,
    ContentOverlay,
  },

  created() {

    EventBus.$on('menu/toggle', () => {
      window.setTimeout(() => {
        this.isOpenMobileMenu = !this.isOpenMobileMenu;
      }, 200);
    });

    EventBus.$on('menu/closeMobileMenu', () => {
      this.isOpenMobileMenu = false;
    });

  },


  data() {
    return {
      isOpenMobileMenu: false,
    };
  },

  computed: {
    wrapperClass() {
      return {
        'toggled': this.isOpenMobileMenu === true,
      };
    },
  }

}

</script>

<style>
  .mtr-15 {
    margin: 15px 15px 0 0;
  }
  .mb-0 {
    margin-bottom: 0
  }
</style>
