<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex flex-col">
        <article class="w-full p-8 bg-white shadow">
          <div class="flex w-full">
            <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
              Manage Your Team
            </h1>
          </div>
        </article>
        <article class="w-full mt-8 p-8 bg-white shadow">
          <edit-team
            class=""
            :team="$props.team"
          />
        </article>
        <article class="w-full mt-8 p-8 bg-white shadow">
          <add-member
            class=""
            :team="$props.team"
            :team_users="$props.team_users"
            :all_users="$props.all_users"
          />
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import EditTeam from "./Sections/EditTeam";
import AddMember from "./Sections/AddMember";
export default {
  name: 'Create',
  components: {
    PortalLayout,
    EditTeam,
    AddMember,
  },
  props: {
    'team': {
      type: Object,
      default: {},
    },
    'team_users': {
      type: Array,
      default: [],
    },
    'all_users': {},
  },
}
</script>

<style lang="scss" scoped>

</style>
