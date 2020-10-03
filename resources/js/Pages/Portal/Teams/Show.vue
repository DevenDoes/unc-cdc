<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex flex-col">
        <article class="w-full p-8 bg-white shadow">
          <div class="w-full flex">
            <div class="w-1/5  border-r border-gray-300 mr-8">
              <h2 class="font-primary font-semibold text-lg text-gray-500">
                Team Info
              </h2>
            </div>
            <div class="w-4/5">
              <div class="info-grid ">
                <h3 class="title">
                  Name
                </h3>
                <p class="body">
                  {{ $props.team.name }}
                </p>
                <h3 class="title">
                  Track
                </h3>
                <p class="body">
                  {{ track }}
                </p>
                <h3
                  class="title"
                  v-if="onTeam"
                >
                  Organization
                </h3>
                <p
                  class="body"
                  v-if="onTeam"
                >
                  <a
                    href="https://github.com/Carolina-Data-Challenge/"
                    class="hover:text-highlight underline"
                    target="_blank"
                  >
                    https://github.com/Carolina-Data-Challenge/
                  </a>
                </p>
                <h3
                  class="title"
                  v-if="onTeam"
                >
                  Repository
                </h3>
                <p
                  class="body"
                  v-if="onTeam"
                >
                  <a
                    :href="$props.team.project.repo_html_url"
                    class="hover:text-highlight underline"
                    target="_blank"
                  >
                    {{ $props.team.project.repo_html_url }}
                  </a>
                </p>
              </div>
            </div>
          </div>
        </article>
        <div
          class="right"
          v-if="onTeam"
        >
          <inertia-link
            :href="'/teams/' + $props.team.id + '/edit'"
            class="block mt-8 px-6 py-2 rounded shadow-sm font-primary font-normal text-base bg-purple-800 text-white hover:bg-purple-700"
          >
            Manage Team
          </inertia-link>
        </div>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
export default {
  name: 'Show',
  components: {
    PortalLayout,
  },
  props: {
    'team': {
      type: Object,
      default: {},
    },
    'user': {
      type: Object,
      default: {},
    }
  },
  computed: {
    track: function () {
      if (this.$props.team.project.track === 'science') {
        return 'Health & Sciences';
      }
      if (this.$props.team.project.track === 'finance') {
        return 'Finance';
      }
      if (this.$props.team.project.track === 'humanities') {
        return 'Humanities';
      }
      if (this.$props.team.project.track === 'culture') {
        return 'Popular Culture';
      }
    },
    onTeam: function () {
      return parseInt(this.$props.user.current_team_id) === parseInt(this.$props.team.id);

    },
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../css/_utilities';

.info-grid {
  @apply grid grid-rows-2 gap-y-4;
  grid-template-columns: auto 1fr;
  .title {
    @apply font-primary font-semibold text-base text-primary text-left row-span-1 col-start-1 pr-8;
  }
  .body {
    @apply font-primary font-normal text-base text-dark row-span-1 col-span-1;
  }
}

.right {
  @apply flex justify-end;
}

</style>
