<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16">
        <div class="w-full flex flex-col">
          <article class="w-full p-8 bg-white shadow">
            <div class="flex w-full">
              <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
                Projects
              </h1>
              <inertia-link
                href="/projects/submit"
                class="flex-initial self-center block text-center px-3 py-2 rounded shadow-sm font-primary font-sm text-base bg-pink-500 text-white hover:bg-pink-400"
              >
                Submit a Project
              </inertia-link>
            </div>
          </article>
          <article class="card">
            <div class="w-1/5 flex-initial border-r border-gray-300">
              <p class="mr-8 font-primary font-semibold text-xl text-gray-500">
                Science
              </p>
            </div>
            <div class="ml-8 flex-1">
              <table class="attendees">
                <tr
                  v-for="project in science_projects"
                  :key="project.id"
                >
                  <td class="flex items-center">
                    {{ project.name }}
                  </td>
                  <td class="flex justify-end">
                    <inertia-link
                      :href="'/projects/' + project.id"
                      class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                    >
                      View Project
                    </inertia-link>
                  </td>
                </tr>
              </table>
            </div>
          </article>
          <article class="card">
            <div class="w-1/5 flex-initial border-r border-gray-300">
              <p class="mr-8 font-primary font-semibold text-xl text-gray-500">
                Finance
              </p>
            </div>
            <div class="ml-8 flex-1">
              <table class="attendees">
                <tr
                  v-for="project in finance_projects"
                  :key="project.id"
                >
                  <td class="flex items-center">
                    {{ project.name }}
                  </td>
                  <td class="flex justify-end">
                    <inertia-link
                      :href="'/projects/' + project.id"
                      class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                    >
                      View Project
                    </inertia-link>
                  </td>
                </tr>
              </table>
            </div>
          </article>
          <article class="card">
            <div class="w-1/5 flex-initial border-r border-gray-300">
              <p class="mr-8 font-primary font-semibold text-xl text-gray-500">
                Humanities
              </p>
            </div>
            <div class="ml-8 flex-1">
              <table class="attendees">
                <tr
                  v-for="project in humanities_projects"
                  :key="project.id"
                >
                  <td class="flex items-center">
                    {{ project.name }}
                  </td>
                  <td class="flex justify-end">
                    <inertia-link
                      :href="'/projects/' + project.id"
                      class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                    >
                      View Project
                    </inertia-link>
                  </td>
                </tr>
              </table>
            </div>
          </article>
          <article class="card">
            <div class="w-1/5 flex-initial border-r border-gray-300">
              <p class="mr-8 font-primary font-semibold text-xl text-gray-500">
                Popular Culture
              </p>
            </div>
            <div class="ml-8 flex-1">
              <table class="attendees">
                <tr
                  v-for="project in culture_projects"
                  :key="project.id"
                >
                  <td class="flex items-center">
                    {{ project.name }}
                  </td>
                  <td class="flex justify-end">
                    <inertia-link
                      :href="'/projects/' + project.id"
                      class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                    >
                      View Project
                    </inertia-link>
                  </td>
                </tr>
              </table>
            </div>
          </article>
        </div>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";

export default {
  name: 'Index',
  components: {
    PortalLayout,
  },
  props: {
    'projects': {
      type: Object,
      default: {},
    },
  },
  data: function () {
    return {
      projectsL: this.$props.projects,
    }
  },
  computed: {
    science_projects: function () {
      console.log(this.$props.projects);
      console.log(this.projectsL);
      let science = []
      for (const $project of this.projectsL) {
        if ($project.track === 'science') {
          science.push($project);
        }
      }
      return science;
    },
    finance_projects: function () {
      let finance = []
      for (const $project of this.projectsL) {
        if ($project.track === 'finance') {
          finance.push($project);
        }
      }
      return finance;
    },
    humanities_projects: function () {
      let humanities = []
      for (const $project of this.projectsL) {
        if ($project.track === 'humanities') {
          humanities.push($project);
        }
      }
      return humanities;
    },
    culture_projects: function () {
      let culture = []
      for (const $project of this.projectsL) {
        if ($project.track === 'culture') {
          culture.push($project);
        }
      }
      return culture;
    },
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../css/_utilities';

.card {
  @apply w-full flex mt-8 p-8 bg-white shadow;
  &:first-child {
    @apply mt-0;
  }
}

.attendees {
  @apply w-full;
  tr {
    @apply w-full flex py-3 px-2 justify-between;
    &:first-child {
      @apply pt-0;
    }
    &:nth-child(n) {
      @apply border-b border-gray-300;
    }
    &:last-child {
      @apply border-none pb-0;
    }
    th {
      @apply font-primary font-semibold text-base text-primary text-left;
    }
    td {
      @apply font-primary font-normal text-base text-dark text-left;
    }
  }
}
</style>
