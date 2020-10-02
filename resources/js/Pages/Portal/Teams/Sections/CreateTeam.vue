<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        Team Info
      </h2>
    </div>
    <div class="w-4/5">
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleCreate"
        >
          <!-- Name -->
          <div class="flex flex-col">
            <label
              for="name-input"
              class="label"
            >
              Name
            </label>
            <input
              id="name-input"
              class="input"
              type="text"
              v-model="form.name"
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
          <div class="flex justify-end mt-6">
            <button
              type="submit"
              class="button button-primary relative"
              :disabled="form.processing"
            >
              <span
                v-if="!form.processing"
              >
                Create
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
  name: 'CreateTeam',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'userId': {
      type: Number,
      default: null,
    },
  },
  data: function () {
    return {
      form: this.$inertia.form({
        name: '',
        track: '',
      }, {
        bag: 'default',
        resetOnSuccess: false,
      })
    }
  },
  methods: {
    handleCreate: function () {
      this.form.post('/teams');
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
