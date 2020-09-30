<template>
  <div class="w-full flex">
    <div class="w-1/5  border-r border-gray-300 mr-8">
      <h2 class="font-primary font-semibold text-lg text-gray-500">
        Personal Info
      </h2>
    </div>
    <div class="w-4/5">
      <form-wrapper>
        <form
          action="#"
          v-on:submit.prevent="handleUpdate"
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
          <!-- Email -->
          <div class="flex flex-col mt-6">
            <label
              for="email-input"
              class="label"
            >
              Email
            </label>
            <input
              id="email-input"
              class="input"
              type="email"
              v-model="form.email"
            >
            <jet-input-error
              :message="form.error('email')"
              class="error"
            />
          </div>
          <!-- Photo -->
          <div class="flex flex-row mt-6 items-center">
            <!-- Current photo -->
            <div
              class="w-20 h-20"
              v-if="!photoPreview"
            >
              <img
                :src="'/storage/' + photo"
                alt="'Profile picture for ' + name"
                class="rounded-full shadow-md object-cover w-full h-full"
              >
            </div>
            <!-- New photo -->
            <div class="mt-2" v-show="photoPreview">
              <span class="block rounded-full w-20 h-20"
                :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
              </span>
            </div>
            <div class="flex flex-col ml-4">
              <label
                for="photo-input"
                class="label"
              >
                Photo
              </label>
              <!-- Upload new photo -->
              <button
                class="mt-2 button bg-white text-dark border border-gray-300 hover:bg-dark hover:text-light hover:border-none"
                type="button"
                @click="selectNewPhoto"
              >
                Upload a New Photo
              </button>
              <!-- File input -->
              <input
                id="photo-input"
                class="hidden"
                type="file"
                ref="photo"
                accept=".png, .jpeg, .jpg"
                v-on:change="updatePhotoPreview"
              >
            </div>
            <jet-input-error
              :message="form.error('photo')"
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
  name: 'UpdatePersonal',
  components: {
    FormWrapper,
    JetInputError,
    HollowDotsSpinner,
  },
  props: {
    'name': {
      type: String,
      default: '',
    },
    'email': {
      type: String,
      default: '',
    },
    'photo': {
      type: String,
      default: '',
    },
  },
  data: function() {
    return {
      form: this.$inertia.form({
        '_method': 'PUT',
        name: this.$props.name,
        email: this.$props.email,
        photo: this.$props.photo,
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
      photoPreview: null
    }
  },
  methods: {
    handleUpdate: function () {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }
      this.form.post('/user/profile/personal', {
        preserveScroll: true
      });
    },
    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
