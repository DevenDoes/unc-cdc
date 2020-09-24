<template>
  <swiper
    ref="directorsSwiper"
    :options="swiperOptions"
  >
    <swiper-slide
      v-for="director in directors"
      :key="director.name"
      class="py-1"
    >
      <div class="card">
        <div class="card-img">
          <img
            class="swiper-lazy"
            :data-src="'/img/headshots/' + director.img"
            :alt="'Image of ' + director.name + '.'"
          >
        </div>
        <div class="card-body">
          <p class="card-body-title">
            {{ director.name }}
          </p>
          <p class="card-body-text">
            {{ director.position }}
          </p>
        </div>
      </div>
    </swiper-slide>
    <div class="swiper-button-prev swiper-button-prev-director" slot="button-prev"></div>
    <div class="swiper-button-next swiper-button-next-director" slot="button-next"></div>
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
      directors: {
        lindsay: {
          name: 'Lindsay Zhou',
          position: 'Co-Executive',
          img: 'lindsay-zhou.jpg',
        },
        shara: {
          name: 'Shara He',
          position: 'Co-Executive',
          img: 'shara-he.jpg',
        },
        lucas: {
          name: 'Lucas Zhang',
          position: 'Graphic Design',
          img: 'lucas-zhang.jpg',
        },
        adya: {
          name: 'Adya Mahajan',
          position: 'Sponsorship',
          img: 'adya-mahajan.jpg',
        },
        harshul: {
          name: 'Harshul Makwana',
          position: 'Sponsorship',
          img: 'harshul-makwana.jpg',
        },
        john: {
          name: 'John Kirollos',
          position: 'Hacker Experience',
          img: 'john-kirollos.jpg',
        },
        sneha: {
          name: 'Sneha Kottakkudy',
          position: 'Logistics',
          img: 'sneha-kottakkudy.jpg',
        },
        vanesa: {
          name: 'Vanesa Munoz',
          position: 'Logistics',
          img: 'vanesa-munoz.jpg',
        },
        brooke: {
          name: 'Brooke Bordonaro',
          position: 'Marketing',
          img: 'brooke-bordonaro.jpg',
        },
        deven: {
          name: 'Deven Jahnke',
          position: 'Web Developer',
          img: 'deven-jahnke.jpg',
        },
      },
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
          nextEl: '.swiper-button-next-director',
          prevEl: '.swiper-button-prev-director'
        }
      },
    };
  },
  computed: {
    swiper: function() {
      return this.$refs.directorsSwiper.$swiper;
    },
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
  .card-body {
    @apply pt-6 pb-2 flex flex-col items-center;
    .card-body-title {
      @apply font-primary font-medium text-primary text-lg;
    }
    .card-body-text {
      @apply font-primary font-light text-dark text-base;
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
