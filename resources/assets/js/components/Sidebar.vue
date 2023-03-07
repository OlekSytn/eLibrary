<template>
  <div class="menu-container">
    <!-- root level itens -->
    <ul class="menu">
      <li class="menu__top">
        <a
        href="#"
        @click.prevent="openProjectLink"
        class="menu__title"
        >
          Aplikasi Perpus
        </a>
      </li>

      <li>
        <router-link to="/" :class="highlightSection('home')">
          <font-awesome-icon icon="home"></font-awesome-icon> Home
        </router-link>
      </li>

      <li>
        <a
        href="#"
        @click.prevent="updateMenu('master')"
        :class="highlightSection('master')"
        >
          <font-awesome-icon icon="database"></font-awesome-icon> Master
          <font-awesome-icon icon="arrow-right" class="menu__arrow-icon"></font-awesome-icon>
        </a>
      </li>

      <li>
        <a
        href="#"
        @click.prevent="updateMenu('loan')"
        :class="highlightSection('loan')"
        >
          <font-awesome-icon icon="exchange-alt"></font-awesome-icon> Transaksi
          <font-awesome-icon icon="arrow-right" class="menu__arrow-icon"></font-awesome-icon>
        </a>
      </li>

      <li>
        <router-link to="/laporan" :class="highlightSection('setting')">
          <font-awesome-icon icon="list"></font-awesome-icon> Laporan
        </router-link>
      </li>

      <li>
        <router-link to="/setting" :class="highlightSection('setting')">
          <font-awesome-icon icon="cog"></font-awesome-icon> Pengaturan
        </router-link>
      </li>

      <li v-if="loggedIn">
        <router-link to="/logout" :class="highlightSection('logout')">
          <font-awesome-icon icon="sign-out-alt"></font-awesome-icon> Logout
        </router-link>
      </li>
      <li v-else>
        <router-link to="/login" :class="highlightSection('logout')">
          <font-awesome-icon icon="sign-in-alt"></font-awesome-icon> Login
        </router-link>
      </li>

    </ul>

    <!-- context menu: childs of root level itens -->
    <transition name="slide-fade">

      <div class="context-menu-container" v-show="showContextMenu">

        <ul class="context-menu">

          <li v-for="(item, index) in menuItens" :key="index">

            <h5 v-if="item.type === 'title'" class="context-menu__title">

              <i :class="item.icon" aria-hidden="true"></i>

              {{item.txt}}

              <a
              v-if="index === 0"
              @click.prevent="closeContextMenu"
              class="context-menu__btn-close"
              href="#"
              >
                <font-awesome-icon icon="window-close"></font-awesome-icon>
              </a>

            </h5>

            <a
            v-else
            href="#"
            @click.prevent="openSection(item)"
            :class="subMenuClass(item.txt)"
            >
              {{item.txt}}
            </a>

          </li>

        </ul>

      </div>

    </transition>

  </div>

</template>

<script>
import menuData from './support/menu-data';
import kebabCase from 'lodash/kebabCase';

export default {
  name: 'Menu',

  data(){
    return {
      contextSection: '',
      menuItens: [],
      menuData: menuData,
      activeSubMenu: '',
      loggedIn: User.loggedIn()
    }
  },

  methods: {
    
    openProjectLink() {
      alert('You could open the project frontend in another tab here, so the logged admin could see changes made to the project ;)');
    },

    updateMenu(context) {
      this.contextSection = context;
      this.menuItens = this.menuData[context];

      if (context === 'home') {
        this.$router.push('/');
        EventBus.$emit('menu/closeMobileMenu');
      }
    },

    highlightSection(section) {
      // console.log(this.contextSection)
      return {
        'menu__link': true,
        'menu__link--active': section === this.contextSection,
      };
    },

    subMenuClass(subMenuName) {
      return {
        'context-menu__link': true,
        'context-menu__link--active': this.activeSubMenu === subMenuName,
      };
    },

    closeContextMenu() {
      this.contextSection = '';
      this.menuItens = [];
    },

    openSection(item) {
      this.activeSubMenu = item.txt;
      console.log(this.getUrl(item))
      this.$router.push(this.getUrl(item));
      EventBus.$emit('menu/closeMobileMenu');
    },

    getUrl(item) {
      // console.log(item.txt)
      // console.log(item.link)
      let sectionSlug = kebabCase(item.txt);
      return `${item.link}/${sectionSlug}`;
    }

  },

  computed: {
    showContextMenu() {
      return this.menuItens.length;
    },
  }

}
</script>
<style>
  .menu__title {
    font-size: 14pt;
  }
</style>
