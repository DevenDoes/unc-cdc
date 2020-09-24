<template>
  <!-- Content container -->
  <div class>
    <!-- Header -->
    <header 
      class="fixed z-10 w-full h-16 md:h-24 bg-primary"
      ref="header"
    >
      <!-- Content wrapper -->
      <div class="flex justify-center h-full px-6 md:justify-between">
        <!-- Header Logo -->
        <a
          href="#hero"
          class="flex-1 h-full py-4 transition duration-300 ease-in md:mx-8"
          :class="headerLogoIsVisible ? 'opacity-100' : 'opacity-0'"
        >
          <img
            src="/img/branding/logo-horizontal.png"
            alt="Carolina Data Challenge logo."
            class="w-auto h-full transition duration-100 ease-in origin-center transform hover:scale-105"
          />
        </a>
        <!-- Mobile menu button -->
        <button class="z-20 w-10 h-full md:w-16" v-on:click="toggleMobileNav">
          <menu-icon
            id="openMenuIcon"
            styles="fill-current text-light w-full object-contain md:h-7"
            ariaTitle="Menu icon"
            ariaDesc="Menu icon for opening site navigation."
            :isVisible="!mobileNavIsVisible"
          />
          <close-icon
            id="closeMenuIcon"
            styles="fill-current text-light w-full object-contain"
            ariaTitle="Close icon"
            ariaDesc="Close icon for closing site navigation."
            :isVisible="mobileNavIsVisible"
          />
        </button>
        <!-- Menu navigation links -->
        <navigation-menu 
          :isVisible="mobileNavIsVisible"
          @toggleNavMenu="toggleMobileNav"
        />
      </div>
    </header>
    <!-- Page content -->
    <slot></slot>
  </div>
</template>

<script>
import MenuIcon from "./../Components/Icons/MenuIcon";
import CloseIcon from "./../Components/Icons/CloseIcon";
import NavigationMenu from "./../Components/Landing/Navigation"
export default {
  components: {
    MenuIcon,
    CloseIcon,
    NavigationMenu
  },
  data() {
    return {
      mobileNavIsVisible: false,
      headerLogoIsVisible: false,
    };
  },
  mounted: function() {
    this.toggleHeaderLogo();
    document.addEventListener('scroll', this.throttle(this.toggleHeaderLogo, 100));
    document.addEventListener('resize', this.throttle(this.toggleHeaderLogo, 100));
  },
  methods: {
    toggleMobileNav: function() {
      this.mobileNavIsVisible = !this.mobileNavIsVisible;
    },
    toggleHeaderLogo: function() {
      let header = this.$refs.header;
      let heroPosition = this.$slots.default[0].elm.getBoundingClientRect().bottom;
      if(heroPosition <= header.getBoundingClientRect().bottom) {
        this.headerLogoIsVisible = true;
        header.classList.add('shadow-lg');
      }
      else {
        this.headerLogoIsVisible = false;
        header.classList.remove('shadow-lg');
      }
    } 
  },
  beforeDestroy: function() {
    document.removeEventListener('scroll', this.throttle(this.toggleHeaderLogo, 100));
    document.removeEventListener('resize', this.throttle(this.toggleHeaderLogo, 100));
  }
};
</script>

<style lang="scss" scoped>



</style>