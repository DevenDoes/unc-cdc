<template>
  <portal-layout>
    <section class="w-full">
      <article class="container mx-auto w-full bg-white mt-8 flex shadow divide-x divide-gray-300">
        <div class="w-1/3 text-center bg-primary px-8 py-4">
          <p class="text-light font-primary font-normal text-base">
            1) Personal Details
          </p>
        </div>
        <div class="w-1/3 text-center px-8 py-4">
          <p class="text-dark font-primary font-normal text-base">
            2) Academic Details
          </p>
        </div>
        <div class="w-1/3 text-center px-8 py-4">
          <p class="text-dark font-primary font-normal text-base">
            3) Shipping Details
          </p>
        </div>
      </article>
      <article class="container mx-auto w-full bg-white mt-8 p-8 shadow">
        <h1 class="font-primary text-primary font-semibold text-2xl">
          Personal Details
        </h1>
        <p class="font-primary text-dark font-normal text-base mt-4">
          Please provide us with your personal details below. If you've already registered through Typeform, your answers will likely be auto populated to save you some time. Just be sure to check them over and update any answers that may have changed.
        </p>
        <div class="h-1 max-w-full border-b border-gray-300 my-8"></div>
        <form-wrapper>
          <form
            action="#"
            v-on:submit.prevent="handleDetails"
          >
            <!-- Gender -->
            <div class="flex flex-col">
              <label
                for="gender-select"
                class="label"
              >
                What is your gender identity?
              </label>
              <select
                id="gender-select"
                class="select"
                v-model="form.gender"
                required
              >
                <option disabled value="">Please select one</option>
                <option>Male</option>
                <option>Female</option>
                <option>Non-Binary</option>
              </select>
              <jet-input-error
                :message="form.error('gender')"
                class="error"
              />
            </div>
            <!-- Race -->
            <div class="flex flex-col mt-6">
              <label
                for="race-select"
                class="label"
              >
                What is your race/ethnicity?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.race === 'Other', 'w-full' : form.race !== 'Other' }"
                >
                  <select
                    id="race-select"
                    class="select w-full"
                    v-model="form.race"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option>American Indian / Alaskan Native</option>
                    <option>Asian / Pacific Islander</option>
                    <option>Black / African American</option>
                    <option>Hispanic / Latinx</option>
                    <option>Middle Eastern / North African</option>
                    <option>White / Caucasian</option>
                    <option>Prefer Not to Answer</option>
                    <option>Other</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.race === 'Other'"
                >
                  <input
                    type="text"
                    class="input w-full"
                    v-model="otherRace"
                    placeholder="Enter your race here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('race')"
                class="error"
              />
            </div>
            <!-- Country -->
            <div class="flex flex-col mt-6">
              <label
                for="country-select"
                class="label"
              >
                What country are you hacking from?
              </label>
              <select
                id="country-select"
                class="select"
                v-model="form.country"
                required
              >
                <option disabled value="">Please select one</option>
                <option
                  v-for="country in countryList" :key="country.code"
                >
                  {{ country.name }}
                </option>
              </select>
              <jet-input-error
                :message="form.error('country')"
                class="error"
              />
            </div>
            <!-- State -->
            <div class="flex flex-col mt-6">
              <label
                for="state-select"
                class="label"
              >
                What state are you hacking from?
              </label>
              <select
                id="state-select"
                class="select"
                v-model="form.state"
                required
              >
                <option disabled value="">Please select one</option>
                <option>Not Applicable</option>
                <option
                  v-for="state in stateList" :key="state.abbreviation"
                >
                  {{ state.name }}
                </option>
                <option>Not Applicable</option>
              </select>
              <jet-input-error
                :message="form.error('state')"
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
              Next
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
      </article>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../../Layouts/PortalLayout";
import FormWrapper from "../../../Components/Portal/FormWrapper";
import JetInputError from "../../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
import { countries } from "../../../Data/Countries.js"
import { states } from "../../../Data/States.js"
export default {
  name: "PersonalDetails.vue",
  components: {
    PortalLayout,
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'gender': {
      type: String,
      default: '',
    },
    'country': {
      type: String,
      default: '',
    },
    'state': {
      type: String,
      default: '',
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        gender: this.$props.gender,
        race: '',
        country: this.$props.country,
        state: this.$props.state,
      },{
        bag: 'default',
        resetOnSuccess: false,
      }),
      otherRace: '',
      countryList: countries,
      stateList: states,
    }
  },
  methods: {
    handleDetails: function() {
      if (this.form.race === 'Other') {
        this.form.race = this.otherRace;
      }
      this.form.post('/profile/personal-details')
      .then(() => {
        console.log('SUCCESS');
      });
    },
  }
}
</script>

<style lang="scss" scoped>
@import '../../../../css/_utilities';
</style>
