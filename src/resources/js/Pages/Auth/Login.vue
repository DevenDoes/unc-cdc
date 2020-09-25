<template>
  <auth-layout>
    <form
      action="#"
      v-on:submit.prevent="handleLogin"
    >
      <!-- Email -->
      <div class="flex flex-col">
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
          autocomplete="current-password"
          required
        >
        <jet-input-error
          :message="form.error('password')"
          class="error"
        />
      </div>
      <!-- Remember -->
      <div class="mt-4">
        <input
          type="checkbox"
          id="remember-input"
          class="checkbox"
          v-model="form.remember"
        >
        <label
          for="remember-input"
          class="label ml-2"
        >
          Remember me
        </label>
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
            Login
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
        href="/forgot-password"
        class="link"
      >
        Forgot you password?
      </inertia-link>
    </div>
  </auth-layout>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import JetInputError from "../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
export default {
  name: "Login",
  components: {
    AuthLayout,
    JetInputError,
    HollowDotsSpinner,
  },
  data: function() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: '',
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    };
  },
  methods: {
    handleLogin: function() {
      this.form.post('/login');
    },
  }
}
</script>

<style lang="scss" scoped>

</style>
