<template>
  <div
    :id="id"
    class="grid-root"
    :class="styles"
  >
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default: ''
    },
    styles: {
      type: String,
      default: ''
    }
  }
};
</script>

<style lang="scss" scoped>

.grid-root {
  @apply grid grid-cols-1 gap-12;
  .grid-item {
    @apply col-span-2;
  }
}

@screen sm {
  .grid-root {
    @apply grid-cols-4;
    .grid-item {
      @media (max-width: 1023px) {
        &:last-child:nth-child(2n-1) {
          grid-column-end: -2;
        }
      }
    }
  }
}

@screen lg {
  .grid-root {
    @apply grid-cols-6;
    .grid-item {
      @media (max-width: 1279px) {
        &:last-child:nth-child(3n-1) {
          grid-column-end: -2;
        }
        &:nth-last-child(2):nth-child(3n+1) {
          grid-column-end: 4;
        }
        &:last-child:nth-child(3n-2) {
          grid-column-end: 5;
        }
      }
    }
  }
}

@screen xl {
  .grid-root {
    @apply grid-cols-8;
    .grid-item {
      &:last-child:nth-child(4n - 1) {
        grid-column-end: -2;
      }
      &:nth-last-child(2):nth-child(4n - 2) {
        grid-column-end: -4;
      }
      &:nth-last-child(3):nth-child(4n - 3) {
        grid-column-end: -6;
      }
      &:last-child:nth-child(4n - 2) {
        grid-column-end: -3;
      }
      &:nth-last-child(2):nth-child(4n - 3) {
        grid-column-end: -5;
      }
      &:last-child:nth-child(4n - 3) {
        grid-column-end: -6;
      }
    }
  }
}
</style>
