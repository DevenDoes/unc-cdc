<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex flex-col">
        <article class="w-full p-8 bg-white shadow">
          <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
            {{ $props.project.name }}
          </h1>
        </article>
        <article class="w-full mt-8 p-8 bg-white shadow">
          <div class="w-full flex">
            <div class="w-1/5  border-r border-gray-300 mr-8">
              <h2 class="font-primary font-semibold text-lg text-gray-500">
                Project Info
              </h2>
            </div>
            <div class="w-4/5">
              <div class="info-grid ">
                <h3 class="title">
                  Track
                </h3>
                <p class="body">
                  {{ track }}
                </p>
                <h3 class="title">
                  Repository
                </h3>
                <a
                  class="link"
                  :href="$props.project.github"
                  target="_blank"
                >
                  View on Github
                </a>
                <h3 class="title">
                  Submitted
                </h3>
                <p class="body">
                  {{ submitted }}
                </p>
              </div>
            </div>
          </div>
        </article>
        <article class="w-full mt-8 p-8 bg-white shadow">
          <div class="w-full flex">
            <div class="w-1/5  border-r border-gray-300 mr-8">
              <h2 class="font-primary font-semibold text-lg text-gray-500">
                Team Members
              </h2>
            </div>
            <div class="w-4/5">
              <div class="w-full grid grid-cols-4 gap-8">
                <inertia-link
                  :href="'/users/profile/' + user.id"
                  class="col-span-1 flex flex-col items-center p-4 bg-light rounded shadow-md transform origin-center transition duration-200 hover:scale-105"
                  v-for="user in $props.members"
                  :key="user.id"
                >
                  <div class="relative w-full pb-full bg-primary rounded-full">
                    <img
                      class="absolute h-full w-full object-cover rounded-full shadow"
                      :src="'/storage/' + user.profile_photo_path"
                      :alt="'Profile photo for' + user.name"
                      v-if="user.profile_photo_path"
                    >
                    <user-icon
                      id="profileMenuIcon"
                      class="absolute w-full h-full p-10"
                      styles="fill-current text-white"
                      ariaTitle="User icon"
                      ariaDesc="User icon for opening the profile page."
                      v-if="!user.profile_photo_path"
                    />
                  </div>
                  <p class="font-primary font-normal text-base text-base text-center mt-4">
                    {{ user.name }}
                  </p>
                </inertia-link>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import UserIcon from "../../../Components/Icons/UserIcon";
import { DateTime } from "luxon";

export default {
  name: 'Show',
  components: {
    PortalLayout,
    UserIcon,
  },
  props: {
    'project': {
      type: Object,
      default: {},
    },
    'members': {
      type: Array,
      default: {},
    },
  },
  computed: {
    track: function () {
      if (this.$props.project.track === 'science') {
        return 'Health & Sciences';
      }
      if (this.$props.project.track === 'finance') {
        return 'Finance';
      }
      if (this.$props.project.track === 'humanities') {
        return 'Humanities';
      }
      if (this.$props.project.track === 'culture') {
        return 'Popular Culture';
      }
    },
    submitted: function () {
      return DateTime.fromISO(this.$props.project.created_at, {
        zone: 'America/New_York',
      })
        .toLocaleString({
          weekday: 'long',
          // month: 'long',
          // day: '2-digit',
          hour: '2-digit',
          minute: '2-digit',
          hour12: true,
        });
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../css/_utilities';

.info-grid {
  @apply grid grid-rows-2 gap-y-4;
  grid-template-columns: auto 1fr;
  .title {
    @apply font-primary font-semibold text-base text-primary text-right row-span-1 col-start-1 pr-8;
  }
  .body {
    @apply font-primary font-normal text-base text-dark row-span-1 col-span-1;
  }
  .link {
    @apply font-primary font-normal text-base text-highlight row-span-1 col-span-1;
    &:hover {
      @apply underline;
    }
  }
}

.absolute-center {
  @apply w-16 h-16 object-contain;
  transform: translate(-50%, -50%);
}

.right {
  @apply flex justify-end;
}
</style>
