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
        class="hidden w-3/5 xl:w-1/2 md:block animate-logo"
      >
      <div class="mt-8">
        <!-- Register button -->
        <inertia-link
          href="/register"
          class="mr-2 text-lg font-normal shadow-lg button bg-highlight text-light font-primary"
        >
          Register
        </inertia-link>
        <!-- Newsletter button -->
        <a
          href="http://eepurl.com/gFzI4n"
          target="_blank"
          class="ml-2 text-lg font-normal shadow-lg button bg-secondary text-light font-primary"
        >
          Newsletter
        </a>
      </div>
    </article>
  </section>

  <!-- Light -->
  <section class="bg-light sm:flex sm:flex-col sm:items-center">
    <!-- About -->
    <article
      id="about"
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5 border-b border-gray-400"
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
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5 border-b border-gray-400"
    >
      <h2 class="article-header text-primary">
        Tracks
      </h2>
      <responsive-grid
        styles="mt-8"
      >
        <div class="flex flex-col items-center w-full h-full p-4 bg-white shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <healthcare-icon
              styles="text-light fill-current object-contain h-12 w-12"
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
        <div class="flex flex-col items-center w-full h-full p-4 bg-white shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <finance-icon
              styles="text-light fill-current object-contain h-20 w-20"
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
        <div class="flex flex-col items-center w-full h-full p-4 bg-white shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <public-policy-icon
              styles="text-light fill-current object-contain h-20 w-20"
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
        <div class="flex flex-col items-center w-full h-full p-4 bg-white shadow-md grid-item">
          <div class="flex items-center justify-center w-20 h-20 p-4 rounded-full shadow-md bg-highlight">
            <entertainment-icon
              styles="text-light fill-current object-contain h-20 w-20"
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
      class="pt-16 mx-8 sm:w-3/4 sm:mx-0 sm:pt-32 lg:w-3/5"
    >
      <h2 class="article-header text-primary">
        Past Events
      </h2>
    </article>
    <div class="w-full mt-8 pb-16 sm:pb-32">
      <photo-slider class="w-full"/>
    </div>
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
      <div>
        <!-- Saturday -->
        <div class="schedule">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Event</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sep. 28th</td>
                <td>19:00 to 20:00</td>
                <td>Workshop: Introduction to R - R Series</td>
              </tr>
              <tr>
                <td>Sep. 29th</td>
                <td>18:00 to 19:00</td>
                <td>Workshop: Introduction to Tableau</td>
              </tr>
              <tr>
                <td>Sep. 30th</td>
                <td>19:00 to 20:00</td>
                <td>Workshop: Introduction to Git & Github</td>
              </tr>
              <tr>
                <td>Oct. 1st</td>
                <td>19:00 to 20:00</td>
                <td>Workshop: Introduction to Spatial Data - R Series</td>
              </tr>
              <tr>
                <td>Oct. 2nd</td>
                <td>19:00 to 20:00</td>
                <td>Meet and Greet</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>09:00 to 10:00</td>
                <td>Team Matching</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>10:00 to 10:45</td>
                <td>Opening Ceremony</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>11:00</td>
                <td>Hacking Begins</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>11:00 to 11:30</td>
                <td>Team Matching on Discord</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>11:00 to 13:00</td>
                <td>Sponsorship Fair</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>13:15 to 14:00</td>
                <td>Workshop: Introduction to R</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>13:00 to 18:30</td>
                <td>Mentor Lounge</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>14:00 to 15:00</td>
                <td>Workshop: Sponsor TBA</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>15:00 to 16:00</td>
                <td>Workshop: Text Processing</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>16:00 to 17:00</td>
                <td>Workshop: Sponsor TBA</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>17:00 to 18:00</td>
                <td>Workshop: Sponsor TBA</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>18:00 to 19:00</td>
                <td>Diversity Panel</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>19:00 to 20:00</td>
                <td>Workshop: Sponsor TBA</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>20:00 to 21:00</td>
                <td>Workshop: Machine Learning Powered Applications</td>
              </tr>
              <tr>
                <td>Oct. 3rd</td>
                <td>22:00 to 22:30</td>
                <td>Mini-Event: Wikipedia Race</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>00:00 to 1:00</td>
                <td>Midnight Check-in</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>1:00 to 2:00</td>
                <td>Mini-Event: CODEWORDS</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>9:00 to 11:00</td>
                <td>Mentor Lounge</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>11:00</td>
                <td>Hacking Ends</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>12:00</td>
                <td>Presentation Submission Deadline</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>12:00 to 18:00</td>
                <td>Judging</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>12:30 to 13:30</td>
                <td>Data Science Recruiting Panel</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>14:00 to 14:30</td>
                <td>Mini-Event: Skribbl.io</td>
              </tr>
              <tr>
                <td>Oct. 4th</td>
                <td>18:00 to 19:00</td>
                <td>Closing Ceremony</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </article>
  </section>

  <!-- Light -->
  <section class="bg-light sm:flex sm:flex-col sm:items-center">
    <!-- FAQs -->
    <article
      id="faqs"
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5 border-b border-gray-400"
    >
      <h2 class="article-header text-primary">
        Frequently Asked Questions
      </h2>
      <div class="flex flex-col w-full mt-8">
        <question-answer class="mb-4">
          <template v-slot:question>
            What is a hackathon?
          </template>
          <template v-slot:answer>
            <p>
              A hackathon is a team event where participants get together and make awesome projects! At the end of it, you can submit your project for various prizes. If hacking isn’t your thing, you can also attend workshops, as well as any of our fun events scattered throughout the day.
            </p>
            <p>
              The Carolina Data Challenge is a bit different from your standard hackathon since we’re specifically targeting data science. At CDC, you’ll have a couple of datasets to choose from, and you can use those datasets to create visualizations, identify patterns, and tell stories.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            How much do I need to know about data science?
          </template>
          <template v-slot:answer>
            <p>
              Nothing! You don’t need any prior experience to participate in CDC, so students of all skill levels are welcome to attend. If you’re new to data science, we’ll have a lot of workshops and mentors to help you along the way.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            How will this year's event be affected by COVID-19?
          </template>
          <template v-slot:answer>
            <p>
              This year, we’re going completely virtual to make sure everyone stays safe and healthy! CDC will take place through our new event portal and some other online platforms. More details will come out as we finalize logistics!
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            Who can attend?
          </template>
          <template v-slot:answer>
            <p>
              CDC is open to undergraduate and graduate students of all skill levels, majors, etc.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            How do teams work?
          </template>
          <template v-slot:answer>
            <p>
              You can work individually or with a team of up to four people. If you already know some people you want to work with, that’s great, but don’t worry if not! We’ll have events before hacking begins to help you connect with other hackers you might want to work with. You can also meet others through the CDC Slack workspace, so keep an eye out for information about joining Slack after you register!
            </p>
            <p>
              Whether you already have a team you'd like to work with or you find one the day of the event, don't worry about telling us just yet. At anytime during the event you'll be able to create and modify your team through our custom event portal to let us know who you're working with.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            What can I build?
          </template>
          <template v-slot:answer>
            <p>
              You can work on just about anything you can think of, as long as you incorporate one of the datasets we provide! You’re also welcome to use outside data sources in addition to the Carolina Data Challenge datasets, as well as any publicly available code you find. However, you may not submit old code (i.e. from previous projects you’ve worked on) for judging.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            Will I fit in?
          </template>
          <template v-slot:answer>
            <p>
              Absolutely! CDC is committed to creating an open, inclusive environment for all of our participants, volunteers, sponsors, mentors, and anybody else who works with us. If you have any concerns, feel free to contact us at <a href="mailto:hello@cdcunc.com" class="text-highlight hover:underline">hello@cdcunc.com</a>.
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            Are there any costs?
          </template>
          <template v-slot:answer>
            <p>
              CDC is completely <span class="text-highlight">free</span> for participants, thanks to all of our awesome sponsors! Participants will also receive free swag!
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            How do I get swag?
          </template>
          <template v-slot:answer>
            <p>
              There will be various ways to earn points throughout the event, such as submitting a project or attending mini events, that go towards receiving swag! After registering, keep an eye out for an email with more information about swag requirements. We’ll also touch base on swag requirements again during the event!
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            What will I need?
          </template>
          <template v-slot:answer>
            <p>
              CDC is completely virtual this year. All you’ll need is your device to hack on (i.e. laptop, desktop, tablet, etc.) and internet connection!
            </p>
          </template>
        </question-answer>
        <question-answer class="mb-4">
          <template v-slot:question>
            How can I register?
          </template>
          <template v-slot:answer>
            <p>
              Registration for the Carolina Data Challenge is now open! You can register <inertia-link href="/register" class="registration-link text-highlight hover:underline">here</inertia-link>!
            </p>
          </template>
        </question-answer>
        <question-answer>
          <template v-slot:question>
            I still have questions!
          </template>
          <template v-slot:answer>
            <p>
              For any questions, comments, concerns, suggestions, or memes you have about the Carolina Data Challenge, please reach out at <a href="mailto:hello@cdcunc.com" class="text-highlight hover:underline">hello@cdcunc.com</a>!
            </p>
          </template>
        </question-answer>
      </div>
    </article>
    <!-- Directors -->
    <article
      id="directors"
      class="pt-16 mx-8 sm:w-3/4 sm:mx-0 sm:pt-32 lg:w-3/5"
    >
      <h2 class="article-header text-primary">
        Our Team of Directors
      </h2>
    </article>
    <div class="w-full mt-8 pb-16 sm:pb-32">
      <director-slider class="w-full"/>
    </div>
    <!-- Sponsors -->
    <article
      id="sponsors"
      class="py-16 mx-8 sm:w-3/4 sm:mx-0 sm:py-32 lg:w-3/5 border-t border-gray-400"
    >
      <h2 class="article-header text-primary">
        Our Sponsors
      </h2>
      <responsive-grid
        styles="mt-8"
      >
        <!-- CapTech -->
        <a
          href="https://www.captechconsulting.com/"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/captech.jpg"
              alt="CapTech logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              CapTech
            </p>
          </div>
        </a>
        <!-- EY -->
        <a
          href="https://www.ey.com/en_us"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/ey.jpg"
              alt="EY logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              EY
            </p>
          </div>
        </a>
        <!-- IAA -->
        <a
          href="https://analytics.ncsu.edu/"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/iaa.jpg"
              alt="Institute for Advanced Analytics logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              Institute for Advanced Analytics
            </p>
          </div>
        </a>
        <!-- MetLife -->
        <a
          href="https://www.metlife.com/"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/metlife.jpg"
              target="_blank"
              alt="MetLife logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              MetLife
            </p>
          </div>
        </a>
        <!-- SAS -->
        <a
          href="https://www.sas.com/en_us/home.html"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/sas.jpg"
              alt="SAS logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              SAS
            </p>
          </div>
        </a>
        <!-- UNC CS -->
        <a
          href="https://cs.unc.edu/"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/unc-cs.jpg"
              alt="University of North Carolina at Chapel Hill Computer Science Department logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              UNC Computer Science
            </p>
          </div>
        </a>
        <!-- VisualDataTools -->
        <a
          href="http://www.visualdatatools.com/"
          target="_blank"
          class="sponsor grid-item"
        >
          <div class="sponsor-img">
            <img
              src="/img/sponsors/visualdatatools.jpg"
              alt="VisualDataTools logo"
            >
          </div>
          <div class="sponsor-tag">
            <p class="sponsor-tag-text">
              VisualDataTools
            </p>
          </div>
        </a>
        <!-- Sponsor? -->
        <a
          href="mailto:sponsors@cdcunc.com"
          class="grid-item bg-primary w-full hover:bg-secondary origin-center scale-100 transform transition duration-200 ease-in hover:scale-105"
        >
          <div class="p-4 w-full h-full flex items-center justify-center">
            <p class="font-semibold text-light text-xl">
              Interested in sponsoring our hackathon?
            </p>
          </div>
        </a>
      </responsive-grid>
    </article>
  </section>
</landing-layout>
</template>

<script>
import LandingLayout from "./../../Layouts/LandingLayout";
import ResponsiveGrid from "./../../Components/Landing/ResponsiveGrid"
import PhotoSlider from "./../../Components/Landing/PhotoSlider"
import QuestionAnswer from "../../Components/Landing/QuestionAnswer";
import DirectorSlider from "../../Components/Landing/DirectorSlider";
import HealthcareIcon from "./../../Components/Icons/HealthcareIcon"
import FinanceIcon from "./../../Components/Icons/FinanceIcon"
import PublicPolicyIcon from "./../../Components/Icons/PublicPolicyIcon"
import EntertainmentIcon from "./../../Components/Icons/EntertainmentIcon"
export default {
  components: {
    LandingLayout,
    ResponsiveGrid,
    PhotoSlider,
    QuestionAnswer,
    DirectorSlider,
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

.schedule {
  @apply mt-8;
  table {
    @apply w-full;
    thead {
      @apply border-b border-white;
      tr {
        @apply flex;
        th:first-child {
          @apply font-primary font-normal text-light text-base py-4 ml-2 w-1/4 text-left;
        }
        th:nth-child(2) {
          @apply font-primary font-normal text-light text-base py-4 w-1/4 text-left;
        }
        th:last-child {
          @apply font-primary font-normal text-light text-base py-4 w-2/4 flex-1 text-left;
        }
      }
    }
    tbody {
      tr {
        transition: background 0.2s ease-in;
        @apply flex;
        &:nth-child(even) {
          @apply bg-secondary;
        }
        &:first-child {
          @apply mt-0;
        }
        &:hover {
          transition: background 0.2s ease-in;
          background: $accent-highlight;
        }
        td:first-child {
          @apply font-primary font-light text-light text-base py-4 ml-2 w-1/4 text-left;
        }
        td:nth-child(2) {
          @apply font-primary font-light text-light text-base py-4 w-1/4 text-left;
        }
        td:last-child {
          @apply font-primary font-light text-light text-base py-4 flex-1 w-2/4 text-left mr-2;
        }
      }
    }
  }
}

.sponsor {
  @apply shadow flex flex-col bg-white origin-center scale-100 transform transition duration-200 ease-in;
  &:hover {
    @apply scale-105;
  }
  .sponsor-img {
    @apply h-32 p-4 flex justify-center;
    img {
      @apply object-contain;
    }
  }
  .sponsor-tag {
    @apply p-2 flex-1 flex bg-primary;
    .sponsor-tag-text {
      @apply font-primary font-light text-base text-light text-center justify-center items-center flex-1;
    }
  }
}

@screen md {
  .schedule {
    table {
      thead {
        tr {
          th:first-child {
            @apply w-1/6 ml-4;
          }
          th:nth-child(2) {
            @apply w-1/6;
          }
          th:last-child {
            @apply w-4/6 mr-4;
          }
        }
      }
      tbody {
        tr {
          td:first-child {
            @apply w-1/6 ml-4;
          }
          td:nth-child(2) {
            @apply w-1/6;
          }
          td:last-child {
            @apply w-4/6 mr-4;
          }
        }
      }
    }
  }
}

</style>
