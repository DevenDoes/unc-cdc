<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        Academics
      </h2>
    </div>
    <div class="w-4/5">
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleUpdate"
        >
          <!-- Academics -->
          <div class="flex flex-col">
            <label
              for="academic-select"
              class="label"
            >
              Academic Details
            </label>
            <select
              id="academic-select"
              class="select"
              v-model="form.share_academics"
            >
              <option value="1">Public</option>
              <option value="0">Private</option>
            </select>
            <jet-input-error
              :message="form.error('linkedin')"
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
  name: 'UpdateAcademics',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'share_academics': {
      type: Number,
      default: 0,
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        '_method': 'PUT',
        share_academics: this.$props.share_academics,
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  methods: {
    handleUpdate: function () {
      this.form.post('/user/profile/academics', {
        preserveScroll: true
      });
    },
  }
}
</script>

<style lang="scss" scoped>

</style>
