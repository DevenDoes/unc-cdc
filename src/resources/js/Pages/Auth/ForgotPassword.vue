<template>
  <auth-layout>
    <p class="text">
      <strong>Forgot your password?</strong>
    </p>
    <p class="text mt-2">
      Just let us know your email address and we will email you a password reset link.
    </p>
    <form
      action="#"
      class="mt-8"
      v-on:submit.prevent="handlePasswordReset"
    >
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
      <div class="flex justify-end mt-4">
        <button
          type="submit"
          class="button button-primary relative"
          :disabled="form.processing"
        >
          <span
            v-if="!form.processing"
          >
            Email Link
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
        Login instead.
      </inertia-link>
    </div>
  </auth-layout>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import JetInputError from "../../Jetstream/InputError";
import { HollowDotsSpinner } from 'epic-spinners';
export default {
  name: "ForgotPassword",
  components: {
    AuthLayout,
    JetInputError,
    HollowDotsSpinner,
  },
  data: function() {
    return {
      form: this.$inertia.form({
        email: '',
      }, {
        bag: 'default',
        resetOnSuccess: false,
      }),
    }
  },
  methods: {
    handlePasswordReset: function() {
      this.form.post('/forgot-password')
      .then(() => {
        if(this.form.successful) {
          this.$inertia.visit('/password-reset-sent');
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
