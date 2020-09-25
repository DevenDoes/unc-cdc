<template>
  <div class="flex flex-col justify-center items-center bg-gray-100 h-screen w-full px-8 sm:px-0">
    <div class="p-4 flex justify-center">
      <inertia-link href="/">
        <img
          src="/img/branding/favicon.png"
          class="h-20 w-auto"
          alt="Carolina Data Challenge logo"
        >
      </inertia-link>
    </div>
    <section class="bg-white relative w-full w-max-96 sm:w-96 rounded shadow-lg p-8">
      <article class="">
        <slot></slot>
      </article>
    </section>
  </div>
</template>

<script>
export default {
  name: "AuthLayout"
}
</script>

<style lang="scss" scoped>
@import "../../css/_utilities";
.label {
  @apply font-normal text-gray-500 text-base font-primary;
}
.input {
  @apply p-2 mt-2 border-b border-gray-300;
  &:focus {
    @apply border-t-0 border-l-0 border-r-0 border-purple-800 outline-none;
  }
}
.checkbox {
  @apply rounded shadow-sm border-gray-300;
}
.button {
  @apply px-6 py-2 rounded shadow-sm font-primary font-normal text-base;
}
.button-primary {
  @apply bg-purple-800 text-white;
  &:hover {
    @apply bg-purple-700;
  }
}
.text {
  @apply text-gray-500;
}
.link {
  @apply text-sm text-gray-500 underline font-primary font-normal;
  &:hover {
    @apply no-underline;
  }
}
.error {
  @apply text-sm text-red-500 font-primary font-light pt-1;
}
</style>
