<template>
  <portal-layout>
    <template v-slot:page-title>
      Next Steps
    </template>
    <section class="container mx-auto">
      <div class="mt-8 md:mt-16 grid grid-cols-1 md:grid-cols-2 grid-flow-row gap-6">
        <article class="card">
          <h2 class="title">
            Join the Conversation
          </h2>
          <p class="text">
            With this year's Carolina Data Challenge being pushed online, fostering meaningful and productive conversation between attendees has been at the forefront of our minds. To aid in that pursuit, we've created a CDC Discord to make communication quick and easy. If your looking to share a meme, find a team, or ask a question be sure to join!
          </p>
          <div class="right">
            <a
              href="https://discord.gg/phuhxAp"
              class="button"
            >
              Join our Discord
            </a>
          </div>
        </article>
        <article class="card">
          <h2 class="title">
            Attend our Sponsor Fair
          </h2>
          <p class="text">
            As students ourselves, we know that the opportunity to meet with sponsors face-to-face is a big draw of any hackathon. That's why we're excited to offer valuable one-on-one time with recruiters to all of our attendees, making you the focus of the conversation. To take full advantage of this unique opportunity, be sure to register on Brazen by uploading your resume.
          </p>
          <div class="right">
            <a
              href="https://app.brazenconnect.com/a/unc-computer-sceince-dept/e/k63NW"
              class="button"
            >
              Reserve your Spot
            </a>
          </div>
        </article>
        <article class="card">
          <h2 class="title">
            Discover our Schedule
          </h2>
          <p class="text">
            Whether you're a data science pro or are just learning what it is that data scientist even do, we promise to make the Carolina Data Challenge well worth your time. With more exciting events and unique learning opportunities than ever before, this year's CDC is designed from the ground up to cater to attendees of all skill levels. Check out our schedule to learn more.
          </p>
          <div class="right">
            <inertia-link
              href="/schedule"
              class="button"
            >
              View our Schedule
            </inertia-link>
          </div>
        </article>
        <article class="card">
          <h2 class="title">
            Explore our Resources
          </h2>
          <p class="text">
            If you find yourself feeling uncertain about what to expect from your first virtual hackathon, you're not alone. Whether your anxious about finding a team to work with or can't shake the feeling that you're missing something important, we've got your back. To help shake your nerves read through our collection of resources containing everything you need to know.
          </p>
          <div class="right">
            <inertia-link
              href="/resources"
              class="button"
            >
              Read our Resources
            </inertia-link>
          </div>
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../Layouts/PortalLayout";
export default {
  name: "NextSteps",
  components: {
    PortalLayout,
  }
}
</script>

<style lang="scss" scoped>
@import "../../../css/_utilities";
.card {
  @apply flex flex-col w-full bg-white p-8 shadow-md col-span-1;
  .title {
    @apply font-primary font-bold text-primary text-xl;
  }
  .text {
    @apply mt-4 font-primary font-light text-dark text-base;
  }
  .right {
    @apply flex justify-end;
  }
  .button {
    @apply inline-block mt-8 px-6 py-2 bg-primary rounded shadow-sm font-primary font-normal text-base text-light;
    &:hover {
      @apply bg-secondary;
    }
  }
}
</style>
