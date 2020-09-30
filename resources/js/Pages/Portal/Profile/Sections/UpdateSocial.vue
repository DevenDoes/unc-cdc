<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        Social Media
      </h2>
    </div>
    <div class="w-4/5">
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleUpdate"
        >
          <!-- LinkedIn -->
          <div class="flex flex-col">
            <label
              for="linkedin-input"
              class="label"
            >
              LinkedIn
            </label>
            <div class="flex w-full">
              <div class="flex-initial mt-2 px-2 flex items-center bg-gray-400">
                <p class="font-primary font-normal text-base text-light">
                  linkedin.com/in/
                </p>
              </div>
              <input
                id="linkedin-input"
                class="input flex-1"
                type="text"
                v-model="form.linkedin"
                placeholder="john-doe"
              >
            </div>
            <jet-input-error
              :message="form.error('linkedin')"
              class="error"
            />
          </div>
          <!-- GitHub -->
          <div class="flex flex-col mt-6">
            <label
              for="github-input"
              class="label"
            >
              GitHub
            </label>
            <div class="flex w-full">
              <div class="flex-initial mt-2 px-2 flex items-center bg-gray-400">
                <p class="font-primary font-normal text-base text-light">
                  github.com/
                </p>
              </div>
              <input
                id="github-input"
                class="input flex-1"
                type="text"
                v-model="form.github"
                placeholder="john-doe"
              >
            </div>
            <jet-input-error
              :message="form.error('github')"
              class="error"
            />
          </div>
          <!-- Discord -->
          <div class="flex flex-col mt-6">
            <label
              for="discord-input"
              class="label"
            >
              Discord
            </label>
            <div class="flex w-full">
              <div class="flex-initial mt-2 px-2 flex items-center bg-gray-400">
                <p class="font-primary font-normal text-base text-light">
                  Username
                </p>
              </div>
              <input
                id="discord-input"
                class="input flex-1"
                type="text"
                v-model="form.discord"
                placeholder="john-doe#2197"
              >
            </div>
            <jet-input-error
              :message="form.error('discord')"
              class="error"
            />
          </div>
          <!-- Twitter -->
          <div class="flex flex-col mt-6">
            <label
              for="twitter-input"
              class="label"
            >
              Twitter
            </label>
            <div class="flex w-full">
              <div class="flex-initial mt-2 px-2 flex items-center bg-gray-400">
                <p class="font-primary font-normal text-base text-light">
                  twitter.com/
                </p>
              </div>
              <input
                id="twitter-input"
                class="input flex-1"
                type="text"
                v-model="form.twitter"
                placeholder="john-doe"
              >
            </div>
            <jet-input-error
              :message="form.error('twitter')"
              class="error"
            />
          </div>
          <div class="flex justify-end mt-6">
            <button
              type="submit"
              class="button button-primary relative"
              :disabled="form.processing"
            >
            <span
              v-if="!form.processing"
            >
              Update
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
export default {
  name: 'UpdateSocial',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
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
  },
  data: function() {
    return {
      form: this.$inertia.form({
        '_method': 'PUT',
        linkedin: this.$props.linkedin,
        github: this.$props.github,
        discord: this.$props.discord,
        twitter: this.$props.twitter,
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  methods: {
    handleUpdate: function () {
      this.form.post('/user/profile/social', {
        preserveScroll: true
      });
    },
  }
}
</script>

<style lang="scss" scoped>

</style>
