<template>
<landing-layout>
  <!-- Hero -->
  <section 
    id="hero" 
    class="relative flex items-center w-full h-screen overflow-hidden bg-primary"
    ref="hero"
  >
    <article class="flex flex-col items-center w-full my-16 md:my-24">
      <!-- Vertical logo -->
      <img 
        src="/img/branding/logo-vertical.png" 
        alt="Carolina Data Challenge logo" 
        class="w-3/5 md:hidden animate-logo"
      >
      <!-- Horizontal logo -->
      <img 
        src="/img/branding/logo-horizontal.png" 
        alt="Carolina Data Challenge logo" 
        class="hidden w-3/5 md:block animate-logo"
      >
      <div class="mt-8">
        <!-- Register button -->
        <inertia-link 
          href="/sign-up" 
          class="mr-2 text-lg font-normal shadow-lg button bg-highlight text-light font-primary"
        >
          Register
        </inertia-link>
        <!-- Newsletter button -->
        <a 
          href="http://eepurl.com/gFzI4n" 
          class="ml-2 text-lg font-normal shadow-lg button bg-secondary text-light font-primary"
        >
          Newsletter
        </a>
      </div>
    </article>
    <!-- Video background -->
    <video 
      id="heroBackground"
      autoplay
      loop
      muted
      playsinline  
    >
      <source
        src="TEMP/img/branding/retro-grid-bg.webm"
        type="video/webm"
      >
    </video>
  </section>

  <!-- Light -->
  <section class="divide-y divide-gray-400 bg-light sm:flex sm:flex-col sm:items-center">
    <!-- About -->
    <article 
      id="about" 
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5"
    >
      <h2 class="article-header text-primary">
        What is the Carolina Data Challenge?
      </h2>
      <p class="article-body text-dark">
        The Carolina Data Challenge is a data science hackathon held annually at the University of North Carolina at Chapel Hill. Participants hack on datasets across a variety of fields, including finance, sports, and social good! The Data Challenge is open to participants of all skill levels, and there will be plenty of resources to help you out along the way.
      </p>
      <p class="article-body text-dark">
        Due to COVID-19, this year’s Data Challenge will be held <span class="font-medium">virtually</span> on the weekend of <span class="font-medium">October 2nd-4th</span> to keep our hackers and our community safe. Don’t worry; you’ll have lots of opportunities to meet sponsors, learn through workshops, and hang out online with other hackers!
      </p>
      <p class="article-body text-dark">
        This year’s Carolina Data Challenge theme is “<span class="font-medium">Stories Across Time</span>.” We’re inviting hackers to look at data from past and present in order to find trends and generate insights for the future! Participants can also take part in tons of retro-themed activities and earn points to redeem prizes throughout the event. Join us for the 2020 Carolina Data Challenge, and take the challenge to tell <span class="font-medium">#StoriesAcrossTime</span>!
      </p>
    </article>
    <!-- Tracks -->
    <article 
      id="tracks" 
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5"
    >
      <h2 class="article-header text-primary">
        Tracks
      </h2>
      <responsive-grid
        styles="mt-8"
      >
        <div class="flex flex-col items-center w-full h-full p-4 bg-white rounded shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <healthcare-icon
              styles="text-light fill-current object-contain"
              ariaTitle="Stethoscope icon"
              ariaDesc="Stethoscope icon for the health and sciences track card."
            />
          </div>
          <h2 class="mt-4 text-base font-medium text-center font-primary text-primary text-dark">
            Health & Sciences
          </h2>
          <p class="mt-4 text-sm font-light text-center font-primary text-dark">
            Healthcare and Natural Sciences
          </p>
        </div>
        <div class="flex flex-col items-center w-full h-full p-4 bg-white rounded shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <finance-icon
              styles="text-light fill-current object-contain"
              ariaTitle="Money icon"
              ariaDesc="Money icon for the finance track card."
            />
          </div>
          <h2 class="mt-4 text-base font-medium text-center font-primary text-primary text-dark">
            Finance
          </h2>
          <p class="mt-4 text-sm font-light text-center font-primary text-dark">
            Money and the Economy
          </p>
        </div>
        <div class="flex flex-col items-center w-full h-full p-4 bg-white rounded shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <public-policy-icon
              styles="text-light fill-current object-contain"
              ariaTitle="Scale icon"
              ariaDesc="Scale icon for the humanities track card."
            />
          </div>
          <h2 class="mt-4 text-base font-medium text-center font-primary text-primary text-dark">
            Humanities
          </h2>
          <p class="mt-4 text-sm font-light text-center font-primary text-dark">
            Political Science, Public Policy, and More
          </p>
        </div>
        <div class="flex flex-col items-center w-full h-full p-4 bg-white rounded shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <entertainment-icon
              styles="text-light fill-current object-contain"
              ariaTitle="Digital media icon"
              ariaDesc="Digital media icon for the entertainment track card."
            />
          </div>
          <h2 class="mt-4 text-base font-medium text-center font-primary text-primary text-dark">
            Popular Culture
          </h2>
          <p class="mt-4 text-sm font-light text-center font-primary text-dark">
            Sports, Music, Movies, and More
          </p>
        </div>
      </responsive-grid>
    </article>
    <!-- Photos -->
    <article 
      id="photos" 
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5"
    >
      <h2 class="article-header text-primary">
        Past Events
      </h2>
    </article>
    <photo-slider class="w-screen"/>
  </section>
  <!-- Dark -->
  <section class="bg-primary md:flex md:flex-col md:items-center">
    <article 
      id="schedule" 
      class="py-16 mx-8 md:w-3/4 md:mx-0 md:py-32 lg:w-3/5"
    >
      <h2 class="article-header text-light">
        Event Schedule
      </h2>

    </article>
  </section>

  <div id="" class="w-screen h-screen bg-red-500"></div>
  <div id="photos" class="w-screen h-screen bg-green-500"></div>
  <div id="schedule" class="w-screen h-screen bg-yellow-500"></div>

</landing-layout>
</template>

<script>
import LandingLayout from "./../../Layouts/LandingLayout";
import ResponsiveGrid from "./../../Components/Landing/ResponsiveGrid"
import PhotoSlider from "./../../Components/Landing/PhotoSlider"
import HealthcareIcon from "./../../Components/Icons/HealthcareIcon"
import FinanceIcon from "./../../Components/Icons/FinanceIcon"
import PublicPolicyIcon from "./../../Components/Icons/PublicPolicyIcon"
import EntertainmentIcon from "./../../Components/Icons/EntertainmentIcon"
export default {
  components: {
    LandingLayout,
    ResponsiveGrid,
    PhotoSlider,
    HealthcareIcon,
    FinanceIcon,
    PublicPolicyIcon,
    EntertainmentIcon
  },
};
</script>

<style lang="scss" scoped>
@import "../../../css/_utilities";

.animate-logo {
  animation-name: logo;
  animation-duration: 8s;
  animation-iteration-count: infinite;
  animation-timing-function: ease-in-out;
}

.button {
  @apply inline-block py-2 px-3 rounded ease-in transition duration-100;
  &:hover {
    @apply bg-light text-dark;
  }
}

@keyframes logo {
  0% {
    transform: scale(0.95);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(0.95);
  }
}

#heroBackground {
  position: absolute;
  object-position: center;
  min-width: 100vw;
  max-width: none;
  min-height: 100%;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: -10;
}

.article-header {
  @apply text-xl font-normal font-secondary;
}

.article-body {
  @apply mt-8 text-base font-normal font-primary;
}

</style>