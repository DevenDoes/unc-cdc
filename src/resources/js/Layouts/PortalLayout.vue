<template>
  <div class="bg-gray-100 min-h-screen w-full pb-16 md:pb-24">
    <!-- Header -->
    <header class="fixed z-10 w-full h-16 md:h-24 bg-primary shadow-md">
      <div class="flex justify-center h-full px-6 md:justify-between">
        <inertia-link
          href="/portal"
          class="flex-1 h-full py-4 md:mx-8"
        >
          <img
            src="/img/branding/favicon.png"
            alt="Carolina Data Challenge logo"
            class="w-auto h-full"
          >
        </inertia-link>
        <!-- Menu button -->
        <button class="z-20 w-10 h-full md:w-16" v-on:click="toggleNav">
          <menu-icon
            id="openMenuIcon"
            styles="fill-current text-light w-full object-contain md:h-7"
            ariaTitle="Menu icon"
            ariaDesc="Menu icon for opening site navigation."
            :isVisible="!navIsVisible"
          />
          <close-icon
            id="closeMenuIcon"
            styles="fill-current text-light w-full object-contain"
            ariaTitle="Close icon"
            ariaDesc="Close icon for closing site navigation."
            :isVisible="navIsVisible"
          />
        </button>
        <!-- Menu navigation links -->
        <navigation-menu
          :isVisible="navIsVisible"
          @toggleNavMenu="toggleNav"
        />
      </div>
    </header>
    <div class="w-full h-16 md:h-24"></div>
    <slot></slot>
  </div>
</template>

<script>
import MenuIcon from "../Components/Icons/MenuIcon";
import CloseIcon from "../Components/Icons/CloseIcon";
import NavigationMenu from "../Components/Portal/Navigation";
export default {
  name: "PortalLayout",
  components: {
    MenuIcon,
    CloseIcon,
    NavigationMenu,
  },
  data: function() {
    return {
      navIsVisible: false,
    }
  },
  methods: {
    toggleNav: function() {
      this.navIsVisible = !this.navIsVisible;
    }
  },
}
</script>

<style lang="scss" scoped>

</style>
