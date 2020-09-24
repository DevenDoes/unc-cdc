<template>
  <svg
    :id="id"
    :class="classAttributes"
    :aria-labelledby="id + 'AriaTitle' + ' ' + id + 'AriaDesc'"
    xmlns="http://www.w3.org/2000/svg"
    width="26"
    height="20"
    viewBox="0 0 352 512"
  >
    <title :id="id + 'AriaTitle'">{{ariaTitle}}</title>
    <desc :id="id + 'AriaDesc'">{{ariaDesc}}</desc>
    <path
      fill="a"
      d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
    />
  </svg>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default: "",
    },
    styles: {
      type: String,
      default: "",
    },
    ariaTitle: {
      type: String,
      default: "",
    },
    ariaDesc: {
      type: String,
      default: "",
    },
    isVisible: {
      type: Boolean,
      default: true,
    },
  },
  computed: {
    classAttributes: function() {
      return this.styles + (this.isVisible ? ' block' : ' hidden');
    }
  }
};
</script>