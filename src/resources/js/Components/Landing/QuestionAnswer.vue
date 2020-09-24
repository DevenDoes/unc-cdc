<template>
  <div class="card">
    <a
      href="#"
      class="card-header"
      v-on:click.prevent="toggleVisibility"
    >
      <p class="card-header-text">
        <slot name="question"></slot>
      </p>
      <button
        class="card-header-button"
        aria-label="Button to toggle visibility of the FAQ answer."
      >
        <expand-icon
          styles="fill-current text-primary w-full h-full"
          :isVisible="!isVisible"
        />
        <minimize-icon
          styles="fill-current text-primary w-full h-full"
          :isVisible="isVisible"
        />
      </button>
    </a>
    <div
      class="card-body"
      v-if="isVisible"
    >
      <slot name="answer"></slot>
    </div>
  </div>
</template>

<script>
import ExpandIcon from "../Icons/ExpandIcon";
import MinimizeIcon from "../Icons/MinimizeIcon";
export default {
  components: {
    ExpandIcon,
    MinimizeIcon,
  },
  data: function() {
    return {
      isVisible: false,
    }
  },
  methods: {
    toggleVisibility: function() {
      this.isVisible = !this.isVisible;
    },
  }
}
</script>

<style lang="scss" scoped>

@import "../../../css/_utilities";

.card {
  @apply w-full shadow;
  .card-header {
    @apply flex items-center justify-between p-4 bg-white;
    .card-header-text {
      @apply text-lg font-medium font-primary text-primary;
    }
    .card-header-button {
      @apply flex-none w-5 h-5;
    }
  }
  .card-body {
    @apply px-4 pb-4 bg-white;
    p {
      @apply text-base font-light font-primary text-dark;
      &:not(:first-child) {
        @apply pt-4;
      }
    }
  }
}

</style>
