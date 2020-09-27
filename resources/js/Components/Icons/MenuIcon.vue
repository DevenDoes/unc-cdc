<template>
  <svg
    :id="id"
    :class="classAttributes"
    :aria-labelledby="id + 'AriaTitle' + ' ' + id + 'AriaDesc'"
    xmlns="http://www.w3.org/2000/svg"
    width="26"
    height="20"
    viewBox="0 0 448 512"
  >
    <title :id="id + 'AriaTitle'">{{ariaTitle}}</title>
    <desc :id="id + 'AriaDesc'">{{ariaDesc}}</desc>
    <path
      class="a"
      d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
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