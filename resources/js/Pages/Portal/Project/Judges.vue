<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16">
        <div class="w-full flex flex-col">
          <article class="w-full p-8 bg-white shadow">
            <div class="flex w-full">
              <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
                Judge Information
              </h1>
            </div>
          </article>
          <article class="card">
            <table class="attendees">
              <tr>
                <td class="flex items-center">
                  Datasets
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://github.com/Carolina-Data-Challenge/datasets"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Datasets
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Projects by Track
                </td>
                <td class="flex justify-end">
                  <inertia-link
                    href="/projects/"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Projects
                  </inertia-link>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Projects for Visual Data Tools
                </td>
                <td class="flex justify-end">
                  <inertia-link
                    href="/projects/vdt"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Projects
                  </inertia-link>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Projects for CapTech
                </td>
                <td class="flex justify-end">
                  <inertia-link
                    href="/projects/captech"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Projects
                  </inertia-link>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Rubric
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://docs.google.com/spreadsheets/d/1sbVEnM2c19tPQiYZf7inzQq2Rk2FN06Bka6QfU3AmTY/edit?usp=sharing"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Rubric
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Science Track
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/Fwmtp5yRzfMKeFCY6"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Humanities/Social Science Track
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/WwmESvhTKWRGs8hQA"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Finance Track
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/3rd2FymBhjuU6wtx7"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Popular Culture Track
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/CcTkohThCwGTeYwz8"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Visual Data Tools
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/wkeVtQgBqkLcaugL6"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - CapTech
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/aRiyz2y3LczQqY9x9"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
              <tr>
                <td class="flex items-center">
                  Judging Form - Final Round
                </td>
                <td class="flex justify-end">
                  <a
                    href="https://forms.gle/gQwMrcdzX66HVZ5J7"
                    class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                  >
                    View Form
                  </a>
                </td>
              </tr>
            </table>
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
