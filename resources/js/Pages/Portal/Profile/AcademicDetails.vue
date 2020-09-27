<template>
  <portal-layout>
    <section class="w-full">
      <article class="container mx-auto w-full bg-white mt-8 flex shadow divide-x divide-gray-300">
        <div class="w-1/3 text-center px-8 py-4">
          <p class="text-dark font-primary font-normal text-base">
            1) Personal Details
          </p>
        </div>
        <div class="w-1/3 text-center bg-primary px-8 py-4">
          <p class="text-light font-primary font-normal text-base">
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
          Academic Details
        </h1>
        <p class="font-primary text-dark font-normal text-base mt-4">
          Please provide us with your academic details below. If you've already registered through Typeform, your answers will likely be auto populated to save you some time. Just be sure to check them over and update any answers that may have changed.
        </p>
        <div class="h-1 max-w-full border-b border-gray-300 my-8"></div>
        <form-wrapper>
          <form
            action="#"
            v-on:submit.prevent="handleDetails"
          >
            <!-- School -->
            <div class="flex flex-col">
              <label
                for="school-select"
                class="label"
              >
                Which school do you currently attend?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.school === 'Other', 'w-full' : form.school !== 'Other' }"
                >
                  <select
                    id="school-select"
                    class="select w-full"
                    v-model="form.school"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option
                      v-for="college in collegeList"
                      :key="college"
                    >
                      {{ college }}
                    </option>
                    <option>Other</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.school === 'Other'"
                >
                  <input
                    type="text"
                    class="input w-full"
                    v-model="otherSchool"
                    placeholder="Enter your school's name here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('school')"
                class="error"
              />
            </div>
            <!-- School Level -->
            <div class="flex flex-col mt-6">
              <label
                for="school-level-select"
                class="label"
              >
                Which degree are you currently completing?
              </label>
              <select
                id="school-level-select"
                class="select"
                v-model="form.school_level"
                required
              >
                <option disabled value="">Please select one</option>
                <option>Undergraduate</option>
                <option>Master's</option>
                <option>PhD</option>
              </select>
              <jet-input-error
                :message="form.error('school_level')"
                class="error"
              />
            </div>
            <!-- Graduation Year -->
            <div class="flex flex-col mt-6">
              <label
                for="graduation-year-select"
                class="label"
              >
                What is your expected graduation year?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.graduation_year === 'Other', 'w-full' : form.graduation_year !== 'Other' }"
                >
                  <select
                    id="graduation-year-select"
                    class="select w-full"
                    v-model="form.graduation_year"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>Other</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.graduation_year === 'Other'"
                >
                  <input
                    type="number"
                    class="input w-full"
                    v-model="otherGraduationYear"
                    placeholder="Enter your expected graduation year here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('graduation_year')"
                class="error"
              />
            </div>
            <!-- Major Primary -->
            <div class="flex flex-col mt-6">
              <label
                for="major-primary-select"
                class="label"
              >
                What is your primary major?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.major_primary === 'Other', 'w-full' : form.major_primary !== 'Other' }"
                >
                  <select
                    id="major-primary-select"
                    class="select w-full"
                    v-model="form.major_primary"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option
                      v-for="topic in topicList"
                      :key="topic"
                    >
                      {{ topic }}
                    </option>
                    <option>Other</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.major_primary === 'Other'"
                >
                  <input
                    type="text"
                    class="input w-full"
                    v-model="otherMajorPrimary"
                    placeholder="Enter your primary major's name here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('major_primary')"
                class="error"
              />
            </div>
            <!-- Major Secondary -->
            <div class="flex flex-col mt-6">
              <label
                for="major-secondary-select"
                class="label"
              >
                What is your secondary major?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.major_secondary === 'Other', 'w-full' : form.major_secondary !== 'Other' }"
                >
                  <select
                    id="major-secondary-select"
                    class="select w-full"
                    v-model="form.major_secondary"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option>Not Applicable</option>
                    <option
                      v-for="topic in topicList"
                      :key="topic"
                    >
                      {{ topic }}
                    </option>
                    <option>Other</option>
                    <option>Not Applicable</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.major_secondary === 'Other'"
                >
                  <input
                    type="text"
                    class="input w-full"
                    v-model="otherMajorSecondary"
                    placeholder="Enter your secondary major's name here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('major_secondary')"
                class="error"
              />
            </div>
            <!-- Minor -->
            <div class="flex flex-col mt-6">
              <label
                for="minor-select"
                class="label"
              >
                What is your minor?
              </label>
              <div class="flex flex-col w-full md:flex-row">
                <div
                  :class="{ 'w-full md:w-1/2 md:pr-2' : form.minor === 'Other', 'w-full' : form.minor !== 'Other' }"
                >
                  <select
                    id="minor-select"
                    class="select w-full"
                    v-model="form.minor"
                    required
                  >
                    <option disabled value="">Please select one</option>
                    <option>Not Applicable</option>
                    <option
                      v-for="topic in topicList"
                      :key="topic"
                    >
                      {{ topic }}
                    </option>
                    <option>Other</option>
                    <option>Not Applicable</option>
                  </select>
                </div>
                <div
                  class="w-full md:w-1/2 md:pl-2"
                  v-if="form.minor === 'Other'"
                >
                  <input
                    type="text"
                    class="input w-full"
                    v-model="otherMinor"
                    placeholder="Enter your minor's name here..."
                    required
                  >
                </div>
              </div>
              <jet-input-error
                :message="form.error('minor')"
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
import { colleges } from "../../../Data/Colleges.js";
import { topics } from "../../../Data/Topics.js";
export default {
  name: "PersonalDetails.vue",
  components: {
    PortalLayout,
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'school': {
      type: String,
      default: '',
    },
    'school_level': {
      type: String,
      default: '',
    },
    'primary_major': {
      type: String,
      default: '',
    },
    'secondary_major': {
      type: String,
      default: '',
    },
    'minor': {
      type: String,
      default: '',
    },
    'graduation_year': {
      type: Number,
      default: '',
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        school: this.$props.school,
        school_level: this.$props.school_level,
        graduation_year: this.$props.graduation_year,
        major_primary: this.$props.primary_major,
        major_secondary: this.$props.secondary_major,
        minor: this.$props.minor,
      },{
        bag: 'default',
        resetOnSuccess: false,
      }),
      otherSchool: '',
      otherGraduationYear: '',
      otherMajorPrimary: '',
      otherMajorSecondary: '',
      otherMinor: '',
      collegeList: colleges,
      topicList: topics,
    }
  },
  methods: {
    handleDetails: function() {
      if (this.form.school === 'Other') {
        this.form.school = this.otherSchool;
      }
      if (this.form.graduation_year === 'Other') {
        this.form.graduation_year = this.otherGraduationYear;
      }
      if (this.form.major_primary === 'Other') {
        this.form.major_primary = this.otherMajorPrimary;
      }
      if (this.form.major_secondary === 'Other') {
        this.form.major_secondary = this.otherMajorSecondary;
      }
      if (this.form.minor === 'Other') {
        this.form.minor = this.otherMinor;
      }
      this.form.post('/profile/academic-details')
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
