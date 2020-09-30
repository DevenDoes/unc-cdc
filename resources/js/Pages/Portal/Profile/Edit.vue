<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex">
        <div class="flex-initial w-full flex flex-col">
          <article class="w-full p-8 bg-white shadow">
            <div class="flex w-full">
              <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
                Update Your Profile
              </h1>
              <inertia-link
                :href="'/user/profile/' + $props.user.id"
                class="flex-initial self-center block px-6 py-2 rounded shadow-sm font-primary font-normal text-base bg-purple-800 text-white hover:bg-purple-700"
              >
                View Profile
              </inertia-link>
            </div>
          </article>
          <article class="w-full mt-8 p-8 bg-white shadow">
            <div class="flex flex-col w-full">
              <update-personal
                class=""
                :name="$props.name"
                :email="$props.email"
                :photo="$props.photo"
              />
            </div>
          </article>
          <article class="w-full mt-8 p-8 bg-white shadow">
            <div class="flex flex-col w-full">
              <update-about
                class=""
                :about="$props.about"
              />
            </div>
          </article>
          <article class="w-full mt-8 p-8 bg-white shadow">
            <div class="flex flex-col w-full">
              <update-social
                class=""
                :linkedin="$props.linkedin"
                :github="$props.github"
                :discord="$props.discord"
                :twitter="$props.twitter"
              />
            </div>
          </article>
          <article class="w-full mt-8 p-8 bg-white shadow">
            <div class="flex flex-col w-full">
              <update-academics
                class=""
                :share_academics="$props.share_academics"
              />
            </div>
          </article>
        </div>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import UpdatePersonal from "./Sections/UpdatePersonal";
import UpdateAbout from "./Sections/UpdateAbout";
import UpdateSocial from "./Sections/UpdateSocial";
import UpdateAcademics from "./Sections/UpdateAcademics";
export default {
  name: 'Show',
  components: {
    PortalLayout,
    UpdatePersonal,
    UpdateAbout,
    UpdateSocial,
    UpdateAcademics,
  },
  props: {
    'user': {
      type: Object,
      default: {},
    },
    'name': {
      type: String,
      default: '',
    },
    'email': {
      type: String,
      default: '',
    },
    'photo': {
      type: String,
      default: '',
    },
    'about': {
      type: String,
      default: '',
    },
    'linkedin': {
      type: String,
      default: '',
    },
    'github': {
      type: String,
      default: '',
    },
    'discord': {
      type: String,
      default: '',
    },
    'twitter': {
      type: String,
      default: '',
    },
    'share_academics': {
      type: Number,
      default: false,
    },
  },
  data: function() {
    return {

    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../css/_utilities';

.social-icon {
  @apply fill-current text-primary object-contain w-full h-full;
}

.social-link {
  @apply ml-2 font-primary font-normal text-base text-dark;
  &:hover {
    @apply underline text-highlight;
  }
}

.academics {
  table {
    @apply w-full;
    tr {
      @apply grid grid-cols-5 gap-8;
      &:first-child {
        @apply mt-4;
      }
      &:not(:first-child) {
        @apply mt-2;
      }
      th {
        @apply col-span-2 font-primary font-semibold text-base text-dark text-left;
      }
      td {
        @apply col-span-3 font-primary font-normal text-base text-dark text-left;
      }
    }
  }
}

.right {
  @apply flex justify-end;
}

@screen lg {
  .academics {
    table {
      tr {
        th {
          @apply col-span-1;
        }
        td {
          @apply col-span-4;
        }
      }
    }
  }
}

</style>
