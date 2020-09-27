<template>
  <auth-layout>
    <p class="text">
      <strong>Password reset link sent successfully!</strong>
    </p>
    <p class="text mt-2">
      A password reset link has been sent to your account's email address. Check you email and use the link to reset your password in the next 60 minutes, otherwise you'll have to request a new link.
    </p>
    <div class="mt-4 flex justify-end">
      <inertia-link href="/login" class="link">
        Login instead.
      </inertia-link>
    </div>
  </auth-layout>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
export default {
  name: "PasswordResetSent",
  components: {
    AuthLayout,
  }
}
</script>

<style lang="scss" scoped>

</style>
