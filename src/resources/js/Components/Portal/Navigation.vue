<template>
  <div>
    <nav
      class="fixed right-0 z-10 flex flex-col items-center justify-between h-screen transition duration-300 ease-in origin-left transform shadow-2xl bg-dark"
      :class="classAttributes"
    >
      <ul class="flex flex-col px-3 my-16 md:my-24">
        <li class="nav-li">
          <inertia-link
            href="/next-steps"
            class="nav-links"
          >
            Next Steps
          </inertia-link>
        </li>
        <li class="nav-li">
          <inertia-link
            href="/portal/schedule"
            class="nav-links"
          >
            Schedule
          </inertia-link>
        </li>
<!--        <li class="nav-li">-->
<!--          <inertia-link-->
<!--            href="/portal/profiles"-->
<!--            class="nav-links"-->
<!--          >-->
<!--            Attendees-->
<!--          </inertia-link>-->
<!--        </li>-->
<!--        <li class="nav-li">-->
<!--          <inertia-link-->
<!--            href="/portal/teams"-->
<!--            class="nav-links"-->
<!--          >-->
<!--            Teams-->
<!--          </inertia-link>-->
<!--        </li>-->
<!--        <li class="nav-li">-->
<!--          <inertia-link-->
<!--            href="/portal/prizes"-->
<!--            class="nav-links"-->
<!--          >-->
<!--            Prizes-->
<!--          </inertia-link>-->
<!--        </li>-->
        <li class="nav-li">
          <inertia-link
            href="/portal/resources"
            class="nav-links"
          >
            Resources
          </inertia-link>
        </li>
      </ul>
      <div class="flex flex-col mb-6 px-4 w-full items-center">
        <inertia-link
          href="/user/profile"
          class="flex justify-center items-center w-14 h-14 rounded-full px-1 py-1 mt-3 text-center transition duration-300 rounded shadow-md bg-secondary text-light hover:bg-light hover:text-dark"
        >
          <user-icon
            id="profileMenuIcon"
            styles="fill-current w-full object-contain"
            ariaTitle="User icon"
            ariaDesc="User icon for opening the profile page."
          />
        </inertia-link>
        <p class="text-light font-primary font-light text-sm mt-1">
          Profile
        </p>
        <a
          href="#"
          class="text-light font-primary font-light text-sm mt-4 block px-2 py-1 bg-secondary rounded hover:bg-light hover:text-dark"
          v-on:click.prevent="handleLogout"
        >
          Logout
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
import UserIcon from "../Icons/UserIcon";
export default {
  components: {
    UserIcon,
  },
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
        body.classList.toggle('overflow-x-hidden');
        this.classAttributes = '-translate-x-0';
      }
      else {
        body.classList.toggle('overflow-x-hidden');
        this.classAttributes = 'translate-x-full';
      }
    }
  },
  methods: {
    toggleVisibility: function() {
      this.$emit('toggleNavMenu');
    },
    handleLogout: function() {
      this.$inertia.post('/logout');
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
