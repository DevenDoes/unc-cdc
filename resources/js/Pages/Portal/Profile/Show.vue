<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex">
        <!-- Side bar -->
        <div class="flex-none w-1/4">
          <article class="flex flex-col w-full p-8 bg-white shadow">
            <!-- Profile picture -->
            <div
              class="relative w-full pb-full bg-primary rounded-full"
              v-if="photo"
            >
              <img
                class="absolute h-full w-full object-cover rounded-full shadow"
                :src="'/storage/' + photo"
                alt="'Profile picture for ' + name"
              >
            </div>
            <!-- Name -->
            <h1 class="w-full mt-4 font-primary font-bold text-2xl text-primary text-center pb-4 border-b border-gray-300">
              {{ name }}
            </h1>
            <!-- LinkedIn -->
            <div
              class="flex mt-4 items-center"
              v-if="linkedin"
            >
              <div class="w-8">
                <linkedin-icon
                  id="linkedin-icon"
                  styles="social-icon"
                  aria-title="LinkedIn Icon"
                />
              </div>
              <a
                :href="'https://www.linkedin.com/in/' + linkedin"
                target="_blank"
                class="social-link"
              >
                {{ linkedin }}
              </a>
            </div>
            <!-- GitHub -->
            <div
              class="flex mt-4 items-center"
              v-if="github"
            >
              <div class="w-8">
                <github-icon
                  id="github-icon"
                  styles="social-icon"
                  aria-title="GitHub Icon"
                />
              </div>
              <a
                :href="'https://github.com/' + github"
                target="_blank"
                class="social-link"
              >
                {{ github }}
              </a>
            </div>
            <!-- Discord -->
            <div
              class="flex mt-4 items-center"
              v-if="discord"
            >
              <div class="w-8">
                <discord-icon
                  id="discord-icon"
                  styles="social-icon"
                  aria-title="Discord Icon"
                />
              </div>
              <a
                href="https://discord.gg/QgSpBAy"
                target="_blank"
                class="social-link"
              >
                {{ discord }}
              </a>
            </div>
            <!-- Twitter -->
            <div
              class="flex mt-4 items-center"
              v-if="twitter"
            >
              <div class="w-8">
                <twitter-icon
                  id="twitter-icon"
                  styles="social-icon"
                  aria-title="Twitter Icon"
                />
              </div>
              <a
                :href="'https://twitter.com/' + twitter"
                target="_blank"
                class="social-link"
              >
                {{ twitter }}
              </a>
            </div>
          </article>
        </div>
        <div class="flex-initial w-3/4 ml-8 flex flex-col">
          <article class="w-full p-8 bg-white shadow">
            <h2 class="font-primary font-semibold text-primary text-lg pb-2 border-b border-gray-300">
              About
            </h2>
            <p class="font-primary font-normal text-base text-dark mt-4">
              {{ about === '' ? 'This attendee has not updated their profile yet...' : about }}
            </p>
          </article>
          <article
            class="w-full mt-8 p-8 bg-white shadow academics"
            v-if="share_academics"
          >
            <h2 class="font-primary font-semibold text-primary text-lg pb-2 border-b border-gray-300">
              Academics
            </h2>
            <table>
              <tr v-if="academics.school !== ''">
                <th>School</th>
                <td>{{ academics.school }}</td>
              </tr>
              <tr v-if="academics.school_level !== ''">
                <th>Degree</th>
                <td>{{ academics.school_level }}</td>
              </tr>
              <tr v-if="academics.graduation_year !== ''">
                <th>Graduation Year</th>
                <td>{{ academics.graduation_year }}</td>
              </tr>
              <tr v-if="academics.major_primary !== ''">
                <th>Primary Major</th>
                <td>{{ academics.major_primary }}</td>
              </tr>
              <tr v-if="academics.major_secondary !== ''">
                <th>Secondary Major</th>
                <td>{{ academics.major_secondary }}</td>
              </tr>
              <tr v-if="academics.minor !== ''">
                <th>Minor</th>
                <td>{{ academics.minor }}</td>
              </tr>
            </table>
          </article>
          <div
            class="right"
            v-if="isOwner"
          >
            <inertia-link
              :href="'/user/profile/' + user.id + '/edit'"
              class="block mt-8 px-6 py-2 rounded shadow-sm font-primary font-normal text-base bg-purple-800 text-white hover:bg-purple-700"
            >
              Edit Profile
            </inertia-link>
          </div>
        </div>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import LinkedinIcon from "../../../Components/Icons/LinkedinIcon";
import GithubIcon from "../../../Components/Icons/GithubIcon";
import DiscordIcon from "../../../Components/Icons/DiscordIcon";
import TwitterIcon from "../../../Components/Icons/TwitterIcon";
import FacebookIcon from "../../../Components/Icons/FacebookIcon";
import InstagramIcon from "../../../Components/Icons/InstagramIcon";
export default {
  name: 'Show',
  components: {
    PortalLayout,
    LinkedinIcon,
    GithubIcon,
    DiscordIcon,
    TwitterIcon,
    FacebookIcon,
    InstagramIcon,
  },
  props: {
    'user': {
      type: Object,
      default: {},
    },
    'isOwner': {
      type: Boolean,
      default: false,
    },
    'name': {
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
    'academics': {
      type: Object,
      default: {
        'school': {
          type: String,
          default: '',
        },
        'school_level': {
          type: String,
          default: '',
        },
        'graduation_year': {
          type: String,
          default: '',
        },
        'major_primary': {
          type: String,
          default: '',
        },
        'major_secondary': {
          type: String,
          default: '',
        },
        'minor': {
          type: String,
          default: '',
        },
      },
    },
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
