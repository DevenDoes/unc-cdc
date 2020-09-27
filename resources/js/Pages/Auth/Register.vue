<template>
  <auth-layout>
    <form
      action="#"
      v-on:submit.prevent="handleRegister"
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
          type="text"
          id="name-input"
          class="input"
          v-model="form.name"
          autocomplete="name"
          required
        >
        <jet-input-error
          :message="form.error('name')"
          class="error"
        />
      </div>
      <!-- Email -->
      <div class="flex flex-col mt-4">
        <label
          for="email-input"
          class="label"
        >
          Email
        </label>
        <input
          type="email"
          id="email-input"
          class="input"
          v-model="form.email"
          autocomplete="email"
          required
        >
        <jet-input-error
          :message="form.error('email')"
          class="error"
        />
      </div>
      <!-- Password -->
      <div class="flex flex-col mt-4">
        <label
          for="password-input"
          class="label"
        >
          Password
        </label>
        <input
          type="password"
          id="password-input"
          class="input"
          v-model="form.password"
          autocomplete="new-password"
          required
        >
        <jet-input-error
          :message="form.error('password')"
          class="error"
        />
      </div>
      <!-- Confirm Password -->
      <div class="flex flex-col mt-4">
        <label
          for="password_confirmation-input"
          class="label"
        >
          Confirm Password
        </label>
        <input
          type="password"
          id="password_confirmation-input"
          class="input"
          v-model="form.password_confirmation"
          autocomplete="new-password"
          required
        >
        <jet-input-error
          :message="form.error('password_confirmation')"
          class="error"
        />
      </div>
      <div class="flex justify-end mt-4">
        <button
          type="submit"
          class="button button-primary relative"
          :disabled="form.processing"
        >
          <span
            v-if="!form.processing"
          >
            Register
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
    <div class="mt-4 flex justify-end">
      <inertia-link
        href="/login"
        class="link"
      >
        Already registered?
      </inertia-link>
    </div>
  </auth-layout>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import JetInputError from "../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
export default {
  name: "Register.vue",
  components: {
    AuthLayout,
    JetInputError,
    HollowDotsSpinner,
  },
  data: function() {
    return {
      form: this.$inertia.form({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  methods: {
    handleRegister: function() {
      this.form.post('/register');
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
