<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex flex-col">
        <article class="w-full p-8 bg-white shadow">
          <div class="flex w-full">
            <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
              Create a Team
            </h1>
          </div>
        </article>
        <article class="w-full mt-8 p-8 bg-white shadow">
          <create-team
            class=""
            :error="$props.error"
            :github="$props.github"
            v-on:clearCreateTeamErrors="clearCreateTeamErrors"
          />
        </article>
        <article
          class="w-full p-8 bg-red-500 shadow"
          v-if="errors.create_team"
        >
          <p class="font-primary font-bold text-lg text-white">
            {{ errors.create_team }}
          </p>
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import CreateTeam from "./Sections/CreateTeam";
export default {
  name: 'Create',
  components: {
    PortalLayout,
    CreateTeam
  },
  props: {
    'user': {
      type: Object,
      default: {},
    },
    'errors': {
      type: Object,
      default: {},
    },
    'github': {
      type: String,
      default: '',
    },
  },
  methods: {
    clearCreateTeamErrors: function () {
      this.$props.errors.create_team = '';
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
