<template>
  <portal-layout>
    <section class="w-full">
      <article class="container mx-auto w-full bg-white mt-8 flex shadow divide-x divide-gray-300">
        <div class="w-1/3 text-center px-8 py-4">
          <p class="text-dark font-primary font-normal text-base">
            1) Personal Details
          </p>
        </div>
        <div class="w-1/3 text-center bg-white px-8 py-4">
          <p class="text-dark font-primary font-normal text-base">
            2) Academic Details
          </p>
        </div>
        <div class="w-1/3 text-center bg-primary px-8 py-4">
          <p class="text-light font-primary font-normal text-base">
            3) Shipping Details
          </p>
        </div>
      </article>
      <article class="container mx-auto w-full bg-white mt-8 p-8 shadow">
        <h1 class="font-primary text-primary font-semibold text-2xl">
          Shipping Details
        </h1>
        <p class="font-primary text-dark font-normal text-base mt-4">
          Please provide us with your shipping details below. If you've already registered through Typeform, your answers will likely be auto populated to save you some time. Just be sure to check them over and update any answers that may have changed.
        </p>
        <div class="h-1 max-w-full border-b border-gray-300 my-8"></div>
        <form-wrapper>
          <form
            action="#"
            v-on:submit.prevent="handleDetails"
          >
            <!-- Consent -->
            <div class="flex flex-col">
              <label
                for="consent-select"
                class="label"
              >
                Do you consent to having swag and other prizes shipped to you?
              </label>
              <select
                id="consent-select"
                class="select w-full"
                v-model="form.consent"
                required
              >
                <option disabled value="">Please select one</option>
                <option :value="1">Yes</option>
                <option :value="0">No</option>
              </select>
              <jet-input-error
                :message="form.error('consent')"
                class="error"
              />
            </div>
            <div v-if="form.consent === 1">
              <!-- Street -->
              <div class="flex flex-col mt-6">
                <label
                  for="street-input"
                  class="label"
                >
                  Street Address
                </label>
                <input
                  type="text"
                  id="street-input"
                  class="input"
                  v-model="form.street"
                  autocomplete="street-address"
                  required
                />
                <jet-input-error
                  :message="form.error('street')"
                  class="error"
                />
              </div>
              <div class="flex flex-col md:flex-row">
                <!-- City -->
                <div class="w-full md:w-1/2 md:pr-2 flex flex-col mt-6">
                  <label
                    for="city-input"
                    class="label"
                  >
                    City
                  </label>
                  <input
                    type="text"
                    id="city-input"
                    class="input"
                    v-model="form.city"
                    autocomplete="address-level2"
                    required
                  />
                  <jet-input-error
                    :message="form.error('city')"
                    class="error"
                  />
                </div>
                <!-- Zip -->
                <div class="w-full md:w-1/2 md:pl-2 flex flex-col mt-6">
                  <label
                    for="zip-input"
                    class="label"
                  >
                    Zip / Postal Code
                  </label>
                  <input
                    type="number"
                    id="zip-input"
                    class="input"
                    v-model="form.zip"
                    autocomplete="postal-code"
                    required
                  />
                  <jet-input-error
                    :message="form.error('zip')"
                    class="error"
                  />
                </div>
              </div>
              <!-- State -->
              <div class="flex flex-col mt-6">
                <label
                  for="state-select"
                  class="label"
                >
                  State / Province
                </label>
                <div class="flex flex-col w-full md:flex-row">
                  <div
                    :class="{ 'w-full md:w-1/2 md:pr-2' : form.state === 'Other', 'w-full' : form.state !== 'Other' }"
                  >
                    <select
                      id="state-select"
                      class="select w-full"
                      v-model="form.state"
                      autocomplete="address-level1"
                      required
                    >
                      <option disabled value="">Please select one</option>
                      <option>Other</option>
                      <option
                        v-for="state in stateList" :key="state.abbreviation"
                      >
                        {{ state.name }}
                      </option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div
                    class="w-full md:w-1/2 md:pl-2"
                    v-if="form.state === 'Other'"
                  >
                    <input
                      type="text"
                      class="input w-full"
                      v-model="otherState"
                      placeholder="Enter your state / province's name here..."
                      autocomplete="address-level1"
                      required
                    >
                  </div>
                </div>
                <jet-input-error
                  :message="form.error('state')"
                  class="error"
                />
              </div>
              <!-- Country -->
              <div class="flex flex-col mt-6">
                <label
                  for="country-select"
                  class="label"
                >
                  Country
                </label>
                <select
                  id="country-select"
                  class="select"
                  v-model="form.country"
                  autocomplete="country-name"
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
    'country': {
      type: String,
      default: '',
    },
    'state': {
      type: String,
      default: '',
    },
    'city': {
      type: String,
      default: '',
    },
    'street': {
      type: String,
      default: '',
    },
    'zip': {
      type: Number,
      default: '',
    },
    'consent': {
      type: Number,
      default: '',
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        country: this.$props.country,
        state: this.$props.state,
        city: this.$props.city,
        street: this.$props.street,
        zip: this.$props.zip,
        consent: this.$props.consent,
      },{
        bag: 'default',
        resetOnSuccess: false,
      }),
      otherState: '',
      countryList: countries,
      stateList: states,
    }
  },
  methods: {
    handleDetails: function() {
      if (this.form.state === 'Other') {
        this.form.state = this.otherState;
      }
      this.form.post('/profile/shipping-details')
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
