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
            :user-id="$props.user.id"
          />
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
  },
}
</script>

<style lang="scss" scoped>

</style>
