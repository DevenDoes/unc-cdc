<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16">
        <div class="w-full flex flex-col">
          <article
            class="card"
            v-for="(letterGroup, letter) in sortedUsers"
            :key="letter"
          >
            <div class="flex-initial border-r border-gray-300">
              <p class="mr-8 font-primary font-semibold text-xl text-gray-500">
                {{ letter }}
              </p>
            </div>
            <div class="ml-8 flex-1">
              <table class="attendees">
                <tr>
                  <th>Name</th>
                  <th>School</th>
                  <th></th>
                </tr>
                <tr
                  v-for="user in letterGroup"
                  :key="user.id"
                >
                  <td class="flex items-center">
                    {{ user.name }}
                  </td>
                  <td
                    class="flex items-center"
                    v-if="user.profile.share_academics && user.academics !== null"
                  >
                    {{ user.academics.school }}
                  </td>
                  <td v-if="!user.profile.share_academics"></td>
                  <td class="flex justify-end">
                    <inertia-link
                      :href="'/user/profile/' + user.id"
                      class="block text-center px-3 py-1 rounded shadow-sm font-primary font-sm text-base bg-purple-800 text-white hover:bg-purple-700"
                    >
                      View Profile
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
    'users': {
      type: Array,
      default: {},
    }
  },
  computed: {
    sortedUsers: function() {
      let sortedUsers = {}
      this.$props.users.forEach((user) => {
        let firstLetter = user.name.charAt(0);
        if (!sortedUsers.hasOwnProperty(firstLetter)) {
          sortedUsers[firstLetter] = []
        }
        sortedUsers[firstLetter].push(user);
      });
      return sortedUsers;
    }
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
    @apply w-full flex py-3 px-2;
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
      &:first-child {
        @apply w-2/5;
      }
      &:nth-child(2) {
        @apply w-2/5;
      }
      &:last-child {
        @apply w-1/5;
      }
    }
    td {
      @apply font-primary font-normal text-base text-dark text-left;
      &:first-child {
        @apply w-2/5;
      }
      &:nth-child(2) {
        @apply w-2/5;
      }
      &:last-child {
        @apply w-1/5;
      }
    }
  }
}

</style>
