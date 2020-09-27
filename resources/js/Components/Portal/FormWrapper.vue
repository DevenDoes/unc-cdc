<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
export default {
    name: "FormWrapper"
}
</script>

<style lang="scss" scoped>
  @import "../../../css/_utilities";
  .label {
    @apply font-normal text-gray-500 text-base font-primary;
  }
  .input {
    @apply p-2 mt-2 border-b border-gray-300;
    &:focus {
      @apply border-t-0 border-l-0 border-r-0 border-purple-800 outline-none;
    }
  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input[type=number] {
    -moz-appearance: textfield;
  }
  .select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23a0aec0' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center right 1rem;
    background-size: 1rem;
    @apply border-b border-gray-300 mt-2 py-2 pl-2 pr-10;
    &:focus {
      @apply border-t-0 border-l-0 border-r-0 border-purple-800 outline-none;
      background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23330b53' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
    }
  }
  .checkbox {
    @apply rounded shadow-sm border border-gray-300;
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
