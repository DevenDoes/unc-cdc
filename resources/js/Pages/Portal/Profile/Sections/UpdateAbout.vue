<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        About You
      </h2>
    </div>
    <div class="w-4/5">
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleUpdate"
        >
          <!-- Bio -->
          <div class="flex flex-col">
            <label
              for="about-textarea"
              class="label"
            >
              Biography
            </label>
            <textarea
              id="about-textarea"
              class="textarea"
              v-model="form.about"
              placeholder="Tell everyone about yourself..."
            ></textarea>
            <jet-input-error
              :message="form.error('about')"
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
  name: 'UpdateAbout',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'about': {
      type: String,
      default: '',
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        '_method': 'PUT',
        about: this.$props.about,
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  methods: {
    handleUpdate: function () {
      this.form.post('/user/profile/about', {
        preserveScroll: true
      });
    },
  }
}
</script>

<style lang="scss" scoped>

</style>
