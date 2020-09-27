<template>
  <auth-layout>
    <p class="text">
      <strong>Account verification email sent!</strong>
    </p>
    <p class="text mt-2">
      A verification email has been sent to the email address you created your new account with. Check you email and use the link to verify your account. If you don't seem to have received the email, try sending another.
    </p>
    <div class="flex justify-end mt-8">
      <button
        type="submit"
        class="button button-primary relative"
        :disabled="processing"
        v-on:click.prevent="handleSendEmail"
      >
          <span
            v-if="!processing"
          >
            Send Another Email
          </span>
        <hollow-dots-spinner
          :animation-duration="1000"
          :dot-size="8"
          :dots-num="3"
          color="#ffffff"
          v-if="processing"
          class="inline-block"
        />
      </button>
    </div>
    <div class="mt-4 flex justify-end">
      <a
        href="#"
        class="link"
        v-on:click.prevent="handleLogout"
      >
        Logout instead.
      </a>
    </div>
  </auth-layout>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import { HollowDotsSpinner } from 'epic-spinners';
export default {
  name: "VerifyEmail",
  components: {
    AuthLayout,
    HollowDotsSpinner,
  },
  data: function() {
    return {
      processing: false,
    }
  },
  methods: {
    handleSendEmail: function() {
      this.processing = true;
      this.$inertia.post('/email/verification-notification')
      .then(() => {
        setTimeout(() => {
          this.processing = false
        }, 1500);
      });
    },
    handleLogout: function() {
      this.$inertia.post('/logout');
    }
  }
}
</script>

<style scoped>

</style>
