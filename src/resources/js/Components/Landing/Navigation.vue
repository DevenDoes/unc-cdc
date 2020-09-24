<template>
  <div>
    <nav 
      class="fixed right-0 z-10 flex flex-col items-center justify-between h-screen transition duration-300 ease-in origin-left transform shadow-2xl bg-dark"
      :class="classAttributes" 
    >
      <ul class="flex flex-col px-3 my-16 md:my-24">
        <li class="nav-li">
          <a 
            href="#about" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            About
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#tracks" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            Tracks
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#photos" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            Photos 
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#schedule" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            Schedule
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#faqs" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            FAQs
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#directors" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            Directors
          </a>
        </li>
        <li class="nav-li">
          <a 
            href="#sponsors" 
            class="nav-links" 
            v-on:click.prevent="handleLinkClick($event)"
          >
            Sponsors
          </a>
        </li>
      </ul>
      <div class="flex flex-col mb-6">
        <a 
          href="#register" 
          class="block px-3 py-2 text-center transition duration-300 rounded shadow-md bg-highlight text-light hover:bg-light hover:text-dark"
        >
          Register
        </a>
        <a 
          href="http://eepurl.com/gFzI4n" 
          class="block px-3 py-2 mt-3 text-center transition duration-300 rounded shadow-md bg-secondary text-light hover:bg-light hover:text-dark"
        >
          Newsletter
        </a>
      </div>
    </nav>
    <div 
      class="outside"
      v-if="isVisible"
      v-on:click="toggleVisibility"
    ></div>
  </div>
</template>

<script>
export default {
  props: {
    isVisible: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      classAttributes: 'translate-x-full'
    }
  },
  watch: {
    isVisible: function() {
      let body = document.querySelector('body');
      if (this.isVisible) {
        body.classList.toggle('overflow-hidden');
        this.classAttributes = '-translate-x-0';
      }
      else {
        body.classList.toggle('overflow-hidden');
        this.classAttributes = 'translate-x-full';
      }
    }
  },
  methods: {
    toggleVisibility: function() {
      this.$emit('toggleNavMenu');
    },
    handleLinkClick: function(e) {
      this.toggleVisibility();
      document.querySelector(e.target.hash).scrollIntoView({
        behavior: 'smooth'
      });
    },
  }
}
</script>

<style lang="scss" scoped>

@import "../../../css/_utilities";

.nav-li {
  @apply block px-6 py-3;
}

.nav-links {
  @apply block h-full w-full font-primary font-light text-base text-light;
  &:hover {
      @apply underline;
  }
}

.outside {
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0px;
  left: 0px;
  z-index: 0;
}

</style>