<template>
  <swiper
    ref="pastEventsSwiper"
    :options="swiperOptions"
  >
    <swiper-slide
      v-for="i in 20"
      :key="i"
      class="py-1"
    >
      <div class="card">
          <div class="card-img">
            <img 
              class="swiper-lazy"
              :data-src="'/img/past-events/' + i + '.jpg'" 
              alt="Image of attendees from previous Carolina Data Challenge events."
            >
          </div>
        </div>
    </swiper-slide>
    <div class="swiper-button-prev" slot="button-prev"></div>
    <div class="swiper-button-next" slot="button-next"></div>
  </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from 'vue-awesome-swiper';
import 'swiper/css/swiper.css';
export default {
  components: {
    Swiper,
    SwiperSlide
  },
  data: function() {
    return {
      swiperOptions: {
        direction: 'horizontal',
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false
        },
        slidesPerView: 1,
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 48,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 48,
          },
          1280: {
            slidesPerView: 4,
            spaceBetween: 48,
          }
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
        preloadImages: false,
        lazy: {
          loadPrevNext: true,
          loadPrevNextAmount: 1,
        },
        watchSlidesVisibility: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
    };
  },
  computed: {
    swiper: function() {
      return this.$refs.pastEventsSwiper.$swiper;
    },
  },
  mounted: function() {
    console.log('Current Swiper instance object', this.swiper);
  },
}
</script>

<style lang="scss" scoped>
@import "../../../css/_utilities";

@mixin aspect-ratio($width, $height) {
  position: relative;
  &:before {
    display: block;
    content: "";
    width: 100%;
    padding-top: ($height / $width) * 100%;
  }
  > .content {
    position: absolute;
    padding:10px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    span:before {
      content:"$width";
    }
    span:after {
      content:"$height";
    }
  }
}

.card {
  @apply bg-white shadow-md h-full p-4 mx-8;
  .card-img {
    @apply w-full;
    @include aspect-ratio(1, 1);
    img {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      height: 100%;
      width: 100%;
      object-fit: cover;
    } 
  }
}

@screen sm {
  .card {
    @apply mx-0;
  }
}

.swiper-button-prev {
  height: 3rem !important;
  width: 3rem !important;
  padding: 0.5rem !important;
  color: $accent-primary !important;
  @apply bg-light rounded-full shadow-md transform origin-center scale-100 ease-in;
  &::after {
    font-size: 1rem !important;
  }
  &:hover {
    @apply scale-105 ease-in;
  }
}

.swiper-button-next {
  height: 3rem !important;
  width: 3rem !important;
  padding: 0.5rem !important;
  color: $accent-primary !important;
  @apply bg-light rounded-full shadow-md transform origin-center scale-100 ease-in;
  &::after {
    font-size: 1rem !important;
  }
  &:hover {
    @apply scale-105 ease-in;
  }
}

</style>