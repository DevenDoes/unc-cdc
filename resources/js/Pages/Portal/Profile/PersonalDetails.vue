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
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.race.includes('Other'), 'w-full' : !form.race.includes('Other') }"
                >
                  <multiselect
                    id="race-select"
                    class="w-full mt-2"
                    v-model="form.race"
                    :options="optionsRace"
                    :multiple="true"
                    :close-on-select="false"
                    :clear-on-select="false"
                    :allowEmpty="false"
                    placeholder="Please select one or more"
                    autocomplete="off"
                    required
                  ></multiselect>
<!--                  <select-->
<!--                    id="race-select"-->
<!--                    class="select w-full"-->
<!--                    v-model="form.race"-->
<!--                    required-->
<!--                  >-->
<!--                    <option disabled value="">Please select one</option>-->
<!--                    <option>American Indian / Alaskan Native</option>-->
<!--                    <option>Asian / Pacific Islander</option>-->
<!--                    <option>Black / African American</option>-->
<!--                    <option>Hispanic / Latinx</option>-->
<!--                    <option>Middle Eastern / North African</option>-->
<!--                    <option>White / Caucasian</option>-->
<!--                    <option>Prefer Not to Answer</option>-->
<!--                    <option>Other</option>-->
<!--                  </select>-->
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.race.includes('Other')"
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
            <div
              class="flex flex-col mt-6"
              v-if="form.country === 'United States'"
            >
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
                <option
                  v-for="state in stateList" :key="state.abbreviation"
                >
                  {{ state.name }}
                </option>
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
import Multiselect from 'vue-multiselect';
import { HollowDotsSpinner } from 'epic-spinners';
import { countries } from "../../../Data/Countries.js";
import { states } from "../../../Data/States.js";
import 'vue-multiselect/dist/vue-multiselect.min.css';
export default {
  name: "PersonalDetails.vue",
  components: {
    PortalLayout,
    FormWrapper,
    JetInputError,
    Multiselect,
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
      optionsRace: [
        'American Indian / Alaskan Native',
        'Asian / Pacific Islander',
        'Black / African American',
        'Hispanic / Latinx',
        'Middle Eastern / North African',
        'White / Caucasian',
        'Prefer Not to Answer',
        'Other'
      ]
    }
  },
  methods: {
    handleDetails: function() {
      if (this.form.race.includes('Other')) {
        this.form.race[this.form.race.indexOf('Other')] = this.otherRace;
      }
      if (this.form.country !== 'United States') {
        this.form.state = 'Not Applicable';
      }
      this.form.post('/profile/personal-details')
      .then(() => {
        console.log('SUCCESS');
      });
    },
  }
}
</script>

<style lang="scss">
@import '../../../../css/_utilities';

.multiselect__tags {
  @apply rounded-none border-t-0 border-r-0 border-l-0 border-b border-gray-300 mt-2 py-2 pl-2 pr-10;
}

.multiselect__placeholder {
  @apply font-primary font-normal text-base text-dark m-0 p-0;
}

.multiselect__input {
  @apply font-primary font-normal text-base text-dark p-0 m-0;
}

.multiselect__input::placeholder {
  @apply font-primary font-normal text-base text-dark;
}

.multiselect__option--highlight {
  @apply bg-highlight text-light;
  &::after {
    @apply bg-highlight text-light;
  }
}

.multiselect__option--selected {
  @apply bg-primary text-light;
  &::after {
    @apply bg-primary text-light;
  }
}

.multiselect__option--selected.multiselect__option--highlight {
  @apply bg-secondary text-light;
  &::after {
    @apply bg-secondary text-light;
  }
}

.multiselect__select {
  background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23a0aec0' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center right 1rem;
  background-size: 1rem;
  &::before {
    content: none;
  }
}

.multiselect--active .multiselect__select {
  transform: none;
  background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23330b53' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
}

.multiselect__tags {
  @apply mt-1;
}

.multiselect__tag {
  @apply bg-primary text-light text-base font-normal font-primary m-0 mr-3 rounded-none py-1 pl-3 pr-7;
}

.multiselect__tag-icon {
  @apply m-0 p-0 rounded-none;
  &::after {
    @apply text-light text-base;
  }
  &:hover, &:focus {
    @apply bg-highlight;
  }
}

</style>
