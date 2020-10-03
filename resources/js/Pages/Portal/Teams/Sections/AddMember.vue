<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        Members
      </h2>
    </div>
    <div class="w-4/5">
      <div class="w-full grid grid-cols-4 gap-8">
        <inertia-link
          :href="'/users/profile/' + user.id"
          class="col-span-1 flex flex-col items-center p-4 bg-light rounded shadow-md transform origin-center transition duration-200 hover:scale-105"
          v-for="user in $props.team_users"
          :key="user.id"
        >
          <div class="relative w-full pb-full bg-primary rounded-full">
            <img
              class="absolute h-full w-full object-cover rounded-full shadow"
              :src="'/storage/' + user.profile_photo_path"
              alt=""
            >
          </div>
          <p class="font-primary font-semibold text-base text-primary mt-4">
            {{ user.name }}
          </p>
          <p class="font-primary font-light text-base text-dark">
            {{ user.profile.github }}
          </p>
        </inertia-link>
      </div>
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleAddMember"
        >
          <!-- Add User -->
          <div class="flex flex-col mt-8">
            <label
              for="user-select"
              class="label"
            >
              Add User
            </label>
            <select
              id="user-select"
              class="select"
              v-model="form.user_id"
            >
              <option disabled value="">Please select one</option>
              <option
                v-for="user in $props.all_users"
                :key="user.id"
                :value="user.id"
              >
                {{ user.name }}
              </option>
            </select>
            <jet-input-error
              :message="form.error('user_id')"
              class="error"
            />
          </div>
          <!-- Add Member GitHub -->
          <div
            class="flex flex-col mt-6"
            v-if="form.user_id"
          >
            <label
              for="github-input"
              class="label"
            >
              GitHub Username
            </label>
            <input
              id="github-input"
              class="input"
              type="text"
              v-model="form.github_username"
              required
            >
            <jet-input-error
              :message="form.error('github_username')"
              class="error"
            />
          </div>
          <div class="mt-6 flex justify-end">
            <button
              type="submit"
              class="button button-primary relative"
              :disabled="form.processing"
            >
              <span
                v-if="!form.processing"
              >
                Add User
              </span>
              <hollow-dots-spinner
                :animation-duration="1000"
                :dot-size="8"
                :dots-num="3"
                color="#ffffff"
                v-if="form.processing"
                class="inline-block"
              />
            </button>
          </div>
        </form>
      </form-wrapper>
    </div>
  </div>
</template>

<script>
import FormWrapper from "../../../../Components/Portal/FormWrapper";
import JetInputError from "../../../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
import GithubIcon from "../../../../Components/Icons/GithubIcon";
export default {
  name: 'AddMember',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
    GithubIcon,
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
  data: function () {
    return {
      form: this.$inertia.form({
        'user_id': '',
        'github_username': ''
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  computed: {
    user_id: function () {
      return this.form.user_id;
    }
  },
  watch: {
    user_id: function () {
      this.form.github_username = this.$props.all_users.find(obj => obj.id === this.form.user_id).profile.github;
    },
  },
  methods: {
    handleAddMember: function () {
      this.form.post('/teams/' + this.$props.team.id + '/member', {
        preserveScroll: true,
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../../css/_utilities';

.user-grid {
  @apply grid grid-rows-2 gap-y-4;
  grid-template-columns: auto 1fr;
  .name-title {
    @apply font-primary font-semibold text-base text-primary text-left row-span-1 col-span-1 pr-8;
  }
  .name {
    @apply font-primary font-normal text-base text-dark row-span-1 col-span-1 pr-8;
  }
  .github-title {
    @apply font-primary font-semibold text-base text-primary text-left row-span-1 col-span-1;
  }
  .github {
    @apply font-primary font-normal text-base text-dark row-span-1 col-span-1;
  }
}
</style>
