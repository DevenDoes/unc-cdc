<template>
  <portal-layout>
    <template v-slot:page-title>
      Schedule
    </template>
    <section class="container mx-auto">
      <div class="mt-8 md:mt-16">
        <div class="">
          <div class="right">
            <label
              for="display-timezone"
              class="label pr-4"
            >
              Timezone
            </label>
            <select
              id="display-timezone"
              class="select "
              v-model="displayTimeZone"
            >
              <option>{{ localTimeZone }}</option>
              <option v-if="localTimeZone !== 'EDT'">EST</option>
            </select>
          </div>
        </div>
        <!-- Render Local Schedule -->
        <article
          class="card"
          v-for="date in Object.keys(eventsLocal)"
          :key="date + 'local'"
          v-if="displayTimeZone !== 'EST'"
        >
          <h2 class="title">
            {{ date }}
          </h2>
          <table>
            <tr>
              <th>Start</th>
              <th>End</th>
              <th>Type</th>
              <th>Event</th>
            </tr>
            <tr
              v-for="(event, index) in eventsLocal[date]"
              :key="event.event + index + 'local'"
            >
              <td>{{ event.start }}</td>
              <td>{{ event.end }}</td>
              <td>{{ event.type }}</td>
              <td>{{ event.event }}</td>
              <td>
                <div class="right">
                  <a
                    :href="event.url"
                    target="_blank"
                    class="button _disabled"
                    v-if="/*eventActive(event)*/ event.url !== '#'"
                  >
                    Attend
                  </a>
                </div>
              </td>
            </tr>
          </table>
        </article>
        <!-- Render EST Schedule -->
        <article
          class="card"
          v-for="date in Object.keys(eventsEST)"
          :key="date + 'EST'"
          v-if="displayTimeZone === 'EST'"
        >
          <h2 class="title">
            {{ date }}
          </h2>
          <table>
            <tr>
              <th>Start</th>
              <th>End</th>
              <th>Type</th>
              <th>Event</th>
            </tr>
            <tr
              v-for="(event, index) in eventsEST[date]"
              :key="event.event + index + 'EST'"
            >
              <td>{{ event.start }}</td>
              <td>{{ event.end }}</td>
              <td>{{ event.type }}</td>
              <td>{{ event.event }}</td>
              <td>
                <div class="right">
                  <a
                    :href="event.url"
                    target="_blank"
                    class="button _disabled"
                    v-if="/*eventActive(event)*/ event.url !== '#'"
                  >
                    Attend
                  </a>
                </div>
              </td>
            </tr>
          </table>
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../Layouts/PortalLayout";
import FormWrapper from "../../Components/Portal/FormWrapper";
import { DateTime, LocalZone } from 'luxon';
export default {
  name: "Schedule",
  props: {
    'schedule': {
      type: Array,
      default: []
    }
  },
  components: {
    PortalLayout,
    FormWrapper,
  },
  data: function() {
    return {
      localTimeZone: DateTime.local().offsetNameShort,
      displayTimeZone: DateTime.local().offsetNameShort,
      curDateTime: DateTime.local().setZone('utc'),
    }
  },
  computed: {
    eventsLocal: function() {
      // Get the distinct event dates
      let events = {};
      this.$props.schedule.forEach((event) => {
        let date;
        if (event.start !== null) {
          date = DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              weekday: 'long',
              month: 'long',
              day: '2-digit',
            });
        } else {
          date = DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              weekday: 'long',
              month: 'long',
              day: '2-digit',
            });
        }

        if(!events.hasOwnProperty(date)) {
          events[date] = [];
        }
        let startDateTime;
        if(event.start === null) {
          startDateTime = '';
        } else {
          startDateTime = DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            });
        }
        let endDateTime;
        if(event.end === null) {
          endDateTime = '';
        } else {
          endDateTime = DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            });
        }
        events[date].push({
          start: startDateTime,
          end: endDateTime,
          type: event.type,
          event: event.event,
          url: event.url,
        });
      });
      return events;
    },
    eventsEST: function() {
      // Get the distinct event dates
      let events = {};
      this.$props.schedule.forEach((event) => {
        let date;
        if (event.start !== null) {
          date = DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              weekday: 'long',
              month: 'long',
              day: '2-digit',
            });
        } else {
          date = DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              weekday: 'long',
              month: 'long',
              day: '2-digit',
            });
        }
        if(!events.hasOwnProperty(date)) {
          events[date] = [];
        }
        let startDateTime;
        if(event.start === null) {
          startDateTime = '';
        } else {
          startDateTime = DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            });
        }
        let endDateTime;
        if(event.end === null) {
          endDateTime = '';
        } else {
          endDateTime = DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            });
        }
        events[date].push({
          start: startDateTime,
          end: endDateTime,
          type: event.type,
          event: event.event,
          url: event.url,
        });
      });
      return events;
    }
  },
  methods: {
    eventActive: function(event) {

    },
  }
}
</script>

<style lang="scss" scoped>
@import "../../../css/_utilities";
.card {
  @apply flex flex-col w-full bg-white p-8 shadow-md;
  &:not(:first-child) {
    @apply mt-8;
  }
  .title {
    @apply font-primary font-bold text-primary text-xl;
  }
  table {
    @apply w-full mt-4;
    tr {
      @apply w-full p-2 grid grid-cols-8 border-b border-gray-100 flex-col items-center;
      &:first-child {
        @apply border-gray-300;
      }
      th {
        @apply text-left font-primary font-semibold text-base text-dark;
        &:nth-child(4) {
          @apply col-span-4;
        }
      }
      td {
        @apply text-left font-primary font-normal text-base text-dark;
        &:nth-child(4) {
          @apply col-span-4;
        }
        .button {
          @apply inline-block px-4 py-1 bg-primary rounded shadow-sm font-primary font-normal text-base text-light;
          &:hover {
            @apply bg-secondary;
          }
        }
        .disabled {
          @apply bg-gray-200 text-white;
          &:hover {
            cursor: not-allowed;
            @apply bg-gray-200;
          }
        }
      }
    }
    .archived {
      @apply line-through;
    }
  }
}
.right {
  @apply flex justify-end;
}
.select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23a0aec0' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center right 1rem;
  background-size: 1rem;
  @apply py-1 pl-3 pr-10 text-base shadow-md;
  &:focus {
    @apply border-0 outline-none;
    background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23330b53' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
  }
}
.label {
  @apply block py-1 px-3 bg-primary font-normal text-light text-base font-primary shadow-md;
}
</style>
