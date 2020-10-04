<template>
  <portal-layout>
    <section class="w-full">
      <div class="container mx-auto w-full mt-8 md:mt-16 flex flex-col">
        <article class="w-full p-8 bg-white shadow">
          <h1 class="flex-1 font-primary font-normal text-2xl text-primary">
            Submit Your Project
          </h1>
          <p class="mt-4 font-primary font-normal text-base text-dark">
            This is the form for submitting your project for judging. The project must be submitted no later than <span class="text-highlight">Sunday (10/4) at 11:00AM EST</span>. If you worked with a team of people, only one person needs to submit this form. Once the form is submitted, all team members should see the project listed on their dashboard. If you encounter any issues or have any questions please contact an event director for assistance.
          </p>
        </article>
        <form-wrapper>
          <form
            action="#"
            v-on:submit.prevent="handleSubmit"
          >
            <article class="w-full mt-8 p-8 bg-white shadow">
              <div class="w-full flex">
                <div class="w-1/5  border-r border-gray-300 mr-8">
                  <h2 class="font-primary font-semibold text-lg text-gray-500">
                    Project Info
                  </h2>
                </div>
                <div class="w-4/5">
                  <!-- Name -->
                  <div class="flex flex-col">
                    <label
                      for="name-input"
                      class="label"
                    >
                      Team Name
                    </label>
                    <input
                      id="name-input"
                      class="input"
                      type="text"
                      placeholder="Really Cool Team Name"
                      v-model="form.name"
                      required
                    >
                    <jet-input-error
                      :message="form.error('name')"
                      class="error"
                    />
                  </div>
                  <!-- Track -->
                  <div class="flex flex-col mt-6">
                    <label
                      for="track-select"
                      class="label"
                    >
                      Track
                    </label>
                    <select
                      id="track-select"
                      class="select"
                      v-model="form.track"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option value="finance">Finance</option>
                      <option value="science">Health & Sciences</option>
                      <option value="humanities">Humanities</option>
                      <option value="culture">Popular Culture</option>
                    </select>
                    <jet-input-error
                      :message="form.error('track')"
                      class="error"
                    />
                  </div>
                  <!-- Github URL -->
                  <div class="flex flex-col mt-6">
                    <label
                      for="github-input"
                      class="label"
                    >
                      Github Repository URL
                    </label>
                    <input
                      id="github-input"
                      class="input"
                      type="text"
                      placeholder="https://github.com/Carolina-Data-Challenge/repository-name-here"
                      v-model="form.github"
                      required
                    >
                    <jet-input-error
                      :message="form.error('github')"
                      class="error"
                    />
                  </div>
                </div>
              </div>
            </article>
            <article class="w-full mt-8 p-8 bg-white shadow">
              <div class="w-full flex">
                <div class="w-1/5  border-r border-gray-300 mr-8">
                  <h2 class="font-primary font-semibold text-lg text-gray-500">
                    Team Members
                  </h2>
                </div>
                <div class="w-4/5">
                  <!-- Member One -->
                  <div class="flex flex-col">
                    <label
                      for="member-one-select"
                      class="label"
                    >
                      Member One
                    </label>
                    <select
                      id="member-one-select"
                      class="select cursor-not-allowed"
                      v-model="form.member_one"
                      disabled
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option
                        v-for="user in $props.users"
                        :key="user.id + '-1'"
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>
                    <jet-input-error
                      :message="form.error('member_one')"
                      class="error"
                    />
                  </div>
                  <!-- Member Two -->
                  <div
                    class="flex flex-col mt-6"
                    v-if="member_count >= 2"
                  >
                    <label
                      for="member-one-select"
                      class="label"
                    >
                      Member Two
                    </label>
                    <select
                      id="member-two-select"
                      class="select"
                      v-model="form.member_two"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option
                        v-for="user in $props.users"
                        :key="user.id + '-2'"
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>
                    <jet-input-error
                      :message="form.error('member_two')"
                      class="error"
                    />
                  </div>
                  <!-- Member Three -->
                  <div
                    class="flex flex-col mt-6"
                    v-if="member_count >= 3"
                  >
                    <label
                      for="member-three-select"
                      class="label"
                    >
                      Member Three
                    </label>
                    <select
                      id="member-three-select"
                      class="select"
                      v-model="form.member_three"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option
                        v-for="user in $props.users"
                        :key="user.id + '-2'"
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>
                    <jet-input-error
                      :message="form.error('member_three')"
                      class="error"
                    />
                  </div>
                  <!-- Member Four -->
                  <div
                    class="flex flex-col mt-6"
                    v-if="member_count >= 4"
                  >
                    <label
                      for="member-four-select"
                      class="label"
                    >
                      Member Four
                    </label>
                    <select
                      id="member-four-select"
                      class="select"
                      v-model="form.member_four"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option
                        v-for="user in $props.users"
                        :key="user.id + '-2'"
                        :value="user.id"
                      >
                        {{ user.name }}
                      </option>
                    </select>
                    <jet-input-error
                      :message="form.error('member_four')"
                      class="error"
                    />
                  </div>
                  <div class="mt-6 flex justify-end">
                    <button
                      type="button"
                      class="button button-dark"
                      v-if="member_count > 1"
                      v-on:click="removeMember"
                    >
                      Remove Member
                    </button>
                    <button
                      type="button"
                      class="button button-secondary ml-4"
                      v-if="member_count < 4"
                      v-on:click="addMember"
                    >
                      Add Member
                    </button>
                  </div>
                </div>
              </div>
            </article>
            <article class="w-full mt-8 p-8 bg-white shadow">
              <div class="w-full flex">
                <div class="w-1/5  border-r border-gray-300 mr-8">
                  <h2 class="font-primary font-semibold text-lg text-gray-500">
                    Prize Categories
                  </h2>
                </div>
                <div class="w-4/5">
                  <!-- Core Prizes -->
                  <div class="flex flex-col">
                    <label
                      for="core-prizes-select"
                      class="label"
                    >
                      Would you like for your project to be considered for the core Carolina Data Challenge prizes?
                    </label>
                    <select
                      id="core-prizes-select"
                      class="select"
                      v-model="form.prizes"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                    <jet-input-error
                      :message="form.error('prizes')"
                      class="error"
                    />
                  </div>
                  <!-- Sponsor Prizes -->
                  <div class="flex flex-col mt-6">
                    <label
                      for="sponsor-prizes-select"
                      class="label"
                    >
                      Would you like for your project to be considered for a sponsor prize?
                    </label>
                    <select
                      id="sponsor-prizes-select"
                      class="select"
                      v-model="form.sponsor_prizes"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option value="no">No</option>
                      <option value="captech">Yes, CapTech: Best Data Visualization</option>
                      <option value="vdt">Yes, Visual Data Tools: Best Data Animations Using DataGraph</option>
                    </select>
                    <jet-input-error
                      :message="form.error('sponsor_prizes')"
                      class="error"
                    />
                  </div>
                </div>
              </div>
            </article>
            <div class="flex justify-end mt-8">
              <button
                type="submit"
                class="button button-primary relative"
                :disabled="form.processing"
              >
                  <span
                    v-if="!form.processing"
                  >
                    Submit Your Project
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
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import FormWrapper from "../../../Components/Portal/FormWrapper";
import JetInputError from "../../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
export default {
  name: 'Create',
  components: {
    PortalLayout,
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'user': {
      type: Object,
      default: {},
    },
    'users': {
      type: Array,
      default: [],
    },
  },
  data: function () {
    return {
      form: this.$inertia.form({
        name: '',
        track: '',
        member_one: this.$props.user.id,
        member_two: '',
        member_three: '',
        member_four: '',
        github: '',
        prizes: 'yes',
        sponsor_prizes: '',
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
      member_count: 1,
    }
  },
  methods: {
    handleSubmit: function () {
      this.form.post('/projects');
    },
    addMember: function () {
      this.member_count <= 4
        ? this.member_count += 1
        : this.member_count;
    },
    removeMember: function () {
      this.member_count > 1
        ? this.member_count -= 1
        : this.member_count;
      if (this.member_count === 1) {
        this.form.member_two = '';
      }
      else if (this.member_count === 2) {
        this.form.member_three = '';
      }
      else if (this.member_count === 3) {
        this.form.member_four = '';
      }
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
